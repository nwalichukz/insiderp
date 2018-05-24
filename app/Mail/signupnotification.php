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
    public function __construct(User $user, VerifyEmail $token)
    {
        $this->name = $user->name;
        $this->password = $user->password;
        $this->id = $user->id;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $subject = 'Bido - Signup Notification';
        $address = 'askbido@gmail.com';
        $name_of = 'Bido';
        return $this->subject($subject)
            ->replyTo($address, $name_of)
            ->from($address, $name_of)
            ->view('email.signupnotification');

    }
}
