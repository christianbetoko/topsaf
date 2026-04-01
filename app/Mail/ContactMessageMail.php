<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->from($this->contact->email, $this->contact->name)
                    ->subject("Nouveau message : " . $this->contact->subject)
                    ->view('emails.contact-message'); // On va créer cette vue après
    }
}