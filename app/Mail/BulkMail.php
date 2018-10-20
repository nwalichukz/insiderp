<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BulkMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject, $content, $username;
    public function __construct($subject, $content, $username)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->subject;
        $address = 'support@bido.com.ng';
        $name = 'Bido';
        return $this->view('email.bulkmail')
                    ->subject($subject)
                    //->replyTo($address, $name)
                    ->from($address, $name);
    }
}
