<?php

namespace App\Mail;

use App\Models\Gatepass;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GatepassVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $message_content;
    public $gatepass;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct(Gatepass $gatepass)
    {
        $this->gatepass = $gatepass;
        $this->message_content = 'Your gatepass  #'.$gatepass->serialNo.' is now verified by '.$gatepass->userVerified->name;
        $this->subject = 'Gatepass verified.';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gatepass Verified',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.verifyGatepass',
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
