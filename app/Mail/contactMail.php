<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $message)
    {  $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message =  $message;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'support@bido.com.ng';
        $name = 'Bido';
        return $this->view('email.contact')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
