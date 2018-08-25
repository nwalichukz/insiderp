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
    public $name, $email, $subject, $content;

    public function __construct($name, $email, $subject, $content)
    {  $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->content =  $content;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $subject = $this->subject;
        $email = $this->email;
        $address = 'support@bido.com.ng';
        $name = 'Contact form - Bido';
        return $this->view('email.contactmail')
                    ->subject($subject)
                    ->replyTo($email, $name)
                    ->from($address, $name);
    }
}
