<?php

namespace App\Jobs;

use App\Mail\MarketingEmail;
use App\Models\EmailCampaign;
use App\Models\EmailCampaignLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMarketingEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $campaignId;
    public array $recipient;
    public int $delaySeconds;

    public function __construct(int $campaignId, array $recipient, int $delaySeconds = 0)
    {
        $this->campaignId = $campaignId;
        $this->recipient = $recipient;
        $this->delaySeconds = $delaySeconds;
    }

    public function handle(): void
    {
        // Throttle: wait the specified delay before sending
        if ($this->delaySeconds > 0) {
            sleep($this->delaySeconds);
        }

        $campaign = EmailCampaign::find($this->campaignId);
        if (!$campaign || $campaign->status === 'draft') {
            return;
        }

        $log = EmailCampaignLog::firstOrCreate(
            [
                'email_campaign_id' => $this->campaignId,
                'recipient_email' => $this->recipient['email'],
            ],
            [
                'recipient_name' => $this->recipient['name'] ?? null,
                'status' => 'pending',
            ]
        );

        if ($log->status === 'sent') {
            return; // Already sent
        }

        try {
            Mail::to($this->recipient['email'])
                ->send(new MarketingEmail(
                    $this->recipient['name'] ?? '',
                    $campaign->subject,
                    $campaign->content,
                    $campaign->attachment_path
                ));

            $log->update(['status' => 'sent', 'sent_at' => now()]);
            $campaign->increment('sent_count');
        } catch (\Exception $e) {
            Log::error('Marketing email failed', [
                'campaign' => $this->campaignId,
                'recipient' => $this->recipient['email'],
                'error' => $e->getMessage(),
            ]);

            $log->update(['status' => 'failed', 'error_message' => $e->getMessage()]);
            $campaign->increment('failed_count');
        }

        // Check if campaign is complete
        if ($campaign->sent_count + $campaign->failed_count >= $campaign->total_recipients) {
            $campaign->update(['status' => 'sent', 'completed_at' => now()]);
        }
    }
}
