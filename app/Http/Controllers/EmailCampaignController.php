<?php

namespace App\Http\Controllers;

use App\Jobs\SendMarketingEmail;
use App\Models\EmailCampaign;
use App\Models\EmailCampaignLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EmailCampaignController extends Controller
{
    /**
     * List all email campaigns with pagination
     */
    public function index(Request $request): JsonResponse
    {
        $campaigns = EmailCampaign::with('creator:id,name')
            ->orderByDesc('created_at')
            ->paginate($request->per_page ?? 15);

        return response()->json(['success' => true, 'data' => $campaigns]);
    }

    /**
     * Get a single campaign with logs
     */
    public function show(EmailCampaign $campaign): JsonResponse
    {
        $campaign->load(['creator:id,name', 'logs' => fn ($q) => $q->latest()->limit(50)]);
        return response()->json(['success' => true, 'data' => $campaign]);
    }

    /**
     * Create a new email campaign (draft or scheduled)
     */
    public function store(Request $request): JsonResponse
    {
        // Parse JSON recipients from form-data if provided as string
        $input = $request->all();
        if (isset($input['recipients']) && is_string($input['recipients'])) {
            $decoded = json_decode($input['recipients'], true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $input['recipients'] = $decoded;
                $request->merge(['recipients' => $decoded]);
            }
        }

        // Parse send_now to boolean
        if (isset($input['send_now'])) {
            $input['send_now'] = in_array($input['send_now'], [true, 'true', '1', 1, 'yes'], true);
        }

        $validator = Validator::make($input, [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string|max:50000',
            'scheduled_at' => 'nullable|date|after:now',
            'recipients' => 'required_without:file|array|min:1',
            'recipients.*.email' => 'required|email',
            'recipients.*.name' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:xlsx,csv,xls|max:5120',
            'recipient_source' => 'required|in:manual,excel,csv',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $recipients = [];
        $attachmentPath = null;

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('campaigns/files');
            $attachmentPath = $path;
            $recipients = $this->parseExcel($file);
        } else {
            $recipients = $request->input('recipients', []);
        }

        if (empty($recipients)) {
            return response()->json(['success' => false, 'message' => 'No valid recipients found.'], 422);
        }

        $status = $request->input('scheduled_at') ? 'scheduled' : 'draft';

        $campaign = EmailCampaign::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'status' => $status,
            'scheduled_at' => $request->scheduled_at,
            'recipients' => $recipients,
            'recipient_source' => $request->recipient_source,
            'attachment_path' => $attachmentPath,
            'total_recipients' => count($recipients),
            'created_by' => $request->user()->id,
        ]);

        // Create pending logs
        $logs = array_map(fn ($r) => [
            'email_campaign_id' => $campaign->id,
            'recipient_email' => $r['email'],
            'recipient_name' => $r['name'] ?? null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ], $recipients);

        EmailCampaignLog::insert($logs);

        // If scheduled for now or immediate send requested
        if (empty($input['scheduled_at']) && !empty($input['send_now'])) {
            $this->dispatchCampaign($campaign);
        }

        return response()->json(['success' => true, 'data' => $campaign], 201);
    }

    /**
     * Update a draft campaign
     */
    public function update(Request $request, EmailCampaign $campaign): JsonResponse
    {
        if ($campaign->status !== 'draft' && $campaign->status !== 'scheduled') {
            return response()->json(['success' => false, 'message' => 'Cannot edit a campaign that has already started sending.'], 422);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'subject' => 'sometimes|string|max:255',
            'content' => 'sometimes|string|max:50000',
            'scheduled_at' => 'nullable|date',
            'recipients' => 'sometimes|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $campaign->update($request->only(['name', 'subject', 'content', 'scheduled_at']));

        if ($request->has('recipients')) {
            $campaign->update([
                'recipients' => $request->recipients,
                'total_recipients' => count($request->recipients),
            ]);
            // Rebuild logs
            $campaign->logs()->delete();
            $logs = array_map(fn ($r) => [
                'email_campaign_id' => $campaign->id,
                'recipient_email' => $r['email'],
                'recipient_name' => $r['name'] ?? null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ], $request->recipients);
            EmailCampaignLog::insert($logs);
        }

        return response()->json(['success' => true, 'data' => $campaign]);
    }

    /**
     * Trigger immediate sending of a campaign
     */
    public function sendNow(EmailCampaign $campaign): JsonResponse
    {
        if (!in_array($campaign->status, ['draft', 'scheduled'])) {
            return response()->json(['success' => false, 'message' => 'Campaign already processed.'], 422);
        }

        $this->dispatchCampaign($campaign);

        return response()->json(['success' => true, 'message' => 'Campaign started.']);
    }

    /**
     * Get logs for a campaign with pagination
     */
    public function logs(Request $request, EmailCampaign $campaign): JsonResponse
    {
        $logs = $campaign->logs()
            ->orderByDesc('created_at')
            ->paginate($request->per_page ?? 50);

        return response()->json(['success' => true, 'data' => $logs]);
    }

    /**
     * Delete a campaign (only if draft or completed)
     */
    public function destroy(EmailCampaign $campaign): JsonResponse
    {
        if ($campaign->status === 'sending') {
            return response()->json(['success' => false, 'message' => 'Cannot delete while sending.'], 422);
        }

        if ($campaign->attachment_path) {
            Storage::delete($campaign->attachment_path);
        }

        $campaign->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Preview email content for testing
     */
    public function preview(Request $request): JsonResponse
    {
        $html = view('emails.marketing.campaign', [
            'subject' => $request->subject ?? 'Preview',
            'content' => $request->content ?? '<p>Preview content</p>',
            'recipientName' => 'Test User',
            'unsubscribeUrl' => config('app.frontend_url') . '/unsubscribe?email=test@example.com',
        ])->render();

        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Dispatch jobs for campaign with 15-second intervals
     */
    private function dispatchCampaign(EmailCampaign $campaign): void
    {
        $campaign->update(['status' => 'sending', 'started_at' => now()]);
        $recipients = $campaign->recipients ?? [];

        foreach ($recipients as $index => $recipient) {
            // 15-second interval between each email
            $delay = $index * 15;
            SendMarketingEmail::dispatch($campaign->id, $recipient, 0)
                ->delay(now()->addSeconds($delay));
        }
    }

    /**
     * Parse Excel/CSV file for recipients
     */
    private function parseExcel($file): array
    {
        $spreadsheet = IOFactory::load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        $recipients = [];
        // Assume first row is headers: name, email
        $headers = array_map('strtolower', array_map('trim', $rows[0] ?? []));
        $nameIdx = array_search('name', $headers);
        $emailIdx = array_search('email', $headers);

        if ($emailIdx === false) {
            // Try first column email, second name
            $emailIdx = 0;
            $nameIdx = 1;
        }

        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $email = filter_var(trim($row[$emailIdx] ?? ''), FILTER_VALIDATE_EMAIL);
            if ($email) {
                $recipients[] = [
                    'email' => $email,
                    'name' => trim($row[$nameIdx] ?? ''),
                ];
            }
        }

        return $recipients;
    }
}
