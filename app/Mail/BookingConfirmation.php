<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public bool $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, bool $isAdmin = false)
    {
        $this->booking = $booking;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isAdmin
            ? "New Booking Request - {$this->booking->full_name}"
            : "Your Gefyra Booking Confirmation";

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->isAdmin
            ? 'emails.booking.admin'
            : 'emails.booking.confirmation';

        return new Content(
            view: $view,
            with: [
                'booking' => $this->booking,
                'serviceName' => $this->booking->getServiceTypeLabel(),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
