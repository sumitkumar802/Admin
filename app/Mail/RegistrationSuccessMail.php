<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;

class RegistrationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct($user)
    {
        $this->user=$user;
        
    }

  
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registration Success Mail',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.registration-success',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
