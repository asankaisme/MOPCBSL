<?php

namespace App\Mail;

use App\Models\CabVoucher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CabVoucherIssue extends Mailable
{
    use Queueable, SerializesModels;

    public $message_content;
    public $cabVoucher;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct(CabVoucher $cabVoucher)
    {
        $this->cabVoucher = $cabVoucher;
        $this->subject = 'Cab voucher issued';
        $this->message_content = 'Please collect your cab voucher #'.$cabVoucher->cv_number.' from the admin division.';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cab Voucher Issued',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.cabVoucher_issue',
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
