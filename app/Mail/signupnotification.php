<?php

namespace App\Mail;

use App\User;
use App\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class signupnotification extends Mailable
{
    use Queueable, SerializesModels;
     public $name;
     public $password;
     public $id;
     public $token;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param VerifyEmail $token
     */
    public function __construct($name, $password, $id, $token)
    {
        $this->name = $name;
        $this->password = $password;
        $this->id = $id;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $subject = 'Bido - Signup Notification';
        $address = 'support@bido.com.ng';
        $name_of = 'Bido';
        return $this->subject($subject)
            ->replyTo($address, $name_of)
            ->from($address, $name_of)
            ->view('email.signupnotification');

    }
}
