<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TerimaIndustriMail extends Mailable
{
    use Queueable, SerializesModels;
    public $type, $nama,$email,$phone;
    /**
     * Create a new message instance.
     */
    public function __construct($nama, $type)
    {
        $this->nama = $nama;
        $this->type = $type;
        $this->email = \App\Models\ProfileCompany::get('email')[0]->email;
        $this->phone = \App\Models\ProfileCompany::get('no_telp')[0]->no_telp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Terima Industri Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.accept',
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
