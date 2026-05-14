<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public string $type;      // accepted | declined | rescheduled
    public ?string $notes;
    public ?string $newDate;
    public ?string $newTime;

    public function __construct(
        Booking $booking,
        string $type,
        ?string $notes = null,
        ?string $newDate = null,
        ?string $newTime = null
    ) {
        $this->booking = $booking;
        $this->type    = $type;
        $this->notes   = $notes;
        $this->newDate = $newDate;
        $this->newTime = $newTime;
    }

    public function envelope(): Envelope
    {
        $subjects = [
            'accepted'    => "Your Booking Has Been Confirmed — Gefyra",
            'declined'    => "Update on Your Gefyra Booking Request",
            'rescheduled' => "Your Gefyra Booking Has Been Rescheduled",
        ];

        return new Envelope(subject: $subjects[$this->type] ?? "Booking Update — Gefyra");
    }

    public function content(): Content
    {
        return new Content(
            view: "emails.booking.{$this->type}",
            with: [
                'booking'     => $this->booking,
                'serviceName' => $this->booking->getServiceTypeLabel(),
                'notes'       => $this->notes,
                'newDate'     => $this->newDate,
                'newTime'     => $this->newTime,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
