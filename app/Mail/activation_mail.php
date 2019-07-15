<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class activation_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token)
    {
        $this->name = $name;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CellPhone - Activation')
            ->from('hovannhan060197@gmail.com','CellPhone')
            ->view('mail.user_activation');
    }
}
