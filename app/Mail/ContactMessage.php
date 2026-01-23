<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $subject = 'New Contact Message: ' . ($this->data['subject'] ?? 'No Subject');

        return $this->subject($subject)
            ->replyTo($this->data['email'], $this->data['name'] ?? null)
            ->view('emails.contact')
            ->with(['data' => $this->data]);
    }
}
