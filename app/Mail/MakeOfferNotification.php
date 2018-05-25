<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeOfferNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $job_name, $amount, $duration;
    public function __construct($job_name, $amount, $duration)
    {
        $this->job_name = $job_name;
        $this->amount = $amount;
        $this->duration = $duration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
         $subject = 'Bido - Job Offer Notification';
        $address = 'askbido@gmail.com';
        $name = 'Bido';
        return $this->view('email.makeoffer')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
