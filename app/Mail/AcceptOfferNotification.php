<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptOfferNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name, $job_name, $amount;
    public function __construct($name)
    {
        $this->name = $name;
        $this->job_name = $job_name;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Bido - Accept Job Offer Notification';
        $address = 'support@bido.com.ng';
        $name = 'Bido';
        return $this->view('email.acceptoffernotification')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
