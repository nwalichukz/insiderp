<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViewNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name, $title, $post_id, $noview;

    public function __construct($name, $title, $post_id, $noview)
    {
       $this->name = $name;
       $this->title = $title;
       $this->post_id = $post_id;
       $this->view = $noview;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Your post is doing well';
        $address = 'support@bido.com.ng';
        $name = 'Bido';
        return $this->view('email.viewnotification')
                    ->subject($subject)
                    ->replyTo($address, $name)
                    ->from($address, $name);
    }
}
