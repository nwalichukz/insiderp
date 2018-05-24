<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateServiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $service_name;
    public function __construct($name, $service_name)
    {
        $this->name = $name;
        $this->service_name = $service_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $subject = 'Bido - Service Signup Notification';
        $address = 'askbido@gmail.com';
        $name = 'Bido';
        return $this->view('email.createservice')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
