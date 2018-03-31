<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Mail;

class mailer extends Controller
{
      /**
	     * Deliver the email confirmation.
	     *
	     * @param  $user, $data
	     * @return void
	     */
	    public static function emailNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido Signup Email Notification'; // Give the email a subject 
	        $message = '
	        Thanks '.$data['name'].' for signing up on Bido!
	        Your account has been created, you can login with the following credentials below. Thanks.
	         
	        ------------------------------
	        Username: '.$data['phone_no'].'
	        Password: '.$data['password'].'
	        ------------------------------
	               
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return mail($to, $subject, $message, $headers);
	    }

		/**
	    * This method sends a new password to the user email
	    *
	    * @var email, $data
	    *
	    * @return mail
	    */

	   	public static function sendpasswordreset($email, $data)
	    {
	        $this->to = $email;
	      
	        $to      = $email; // Send email to our user
	        $subject = 'Password Reset Notification'; // Give the email a subject 
	        $message = '
	        Your password has been reset !!!
	        Use this password to login and update your password.!
	        
	        ------------------------
	        New Password: '.$data['password'].'
	        ------------------------
	                
	        ';

	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
           return mail($to, $subject, $message, $headers);
	    }

}
