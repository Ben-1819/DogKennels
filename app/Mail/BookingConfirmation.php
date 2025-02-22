<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use App\Models\Owner;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $owner;
    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Booking Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'booking.confirmation',
            with:[
                'id' => $this->booking->id,
                'owner_id' => $this->booking->owner_id,
                'dog_id' => $this->booking->owner_id,
                "kennel_id" => $this->booking->kennel_id,
                "booking_start" => $this->booking->booking_start,
                "booking_end" => $this->booking->booking_end
            ],
        );

        /*return $this->view("booking.confirmation.email")
                    ->subject("Booking Confirmation")
                    ->with([
                        'id' => $this->booking->id,
                        'owner_id' => $this->booking->owner_id,
                        'dog_id' => $this->booking->owner_id,
                        "kennel_id" => $this->booking->kennel_id,
                        "booking_start" => $this->booking->booking_start,
                        "booking_end" => $this->booking->booking_end
                    ]);*/
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
