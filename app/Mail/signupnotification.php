<?php

namespace App\Mail;

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
     * @return void
     */
    public function __construct($name, $password, $id, $token)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $subject = 'Bido - Signup Notification';
        $address = 'askbido@gmail.com';
        $name = 'Bido';
        return $this->view('email.signupnotification')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
