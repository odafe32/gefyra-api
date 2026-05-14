<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MarketingEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $recipientName;
    public string $subjectLine;
    public string $bodyContent;
    public ?string $attachmentPath;

    public function __construct(
        string $recipientName,
        string $subject,
        string $content,
        ?string $attachmentPath = null
    ) {
        $this->recipientName = $recipientName;
        $this->subjectLine = $subject;
        $this->bodyContent = $content;
        $this->attachmentPath = $attachmentPath;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectLine,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.marketing.campaign',
            with: [
                'subject' => $this->subjectLine,
                'content' => $this->bodyContent,
                'recipientName' => $this->recipientName,
                'unsubscribeUrl' => config('app.frontend_url') . '/unsubscribe?email=' . urlencode($this->to[0]['address'] ?? ''),
            ],
        );
    }

    public function attachments(): array
    {
        if (!$this->attachmentPath || !file_exists(storage_path('app/' . $this->attachmentPath))) {
            return [];
        }

        return [
            Attachment::fromPath(storage_path('app/' . $this->attachmentPath)),
        ];
    }
}
