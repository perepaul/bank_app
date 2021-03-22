<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TokenMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $body,$subject,$user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$user)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.token')->subject($this->subject);
    }
}
