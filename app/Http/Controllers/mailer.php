<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Mail;

class mailer extends Controller
{
      /**
	     * Deliver the email notification.
	     *
	     * @param  $user, $data
	     * @return void
	     */
	    public static function emailNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Signup Email Notification'; // Give the email a subject 
	        $message = '
	        Thanks '.$data['name'].' for signing up on Bido!
	        Your account has been created, you can login with the following credentials below. Thanks.
	         
	        ------------------------------
	        Username: '.$data['phone_no'].'
	        Password: '.$data['password'].'
	        ------------------------------
	               
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
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
	        Use this password to login and update your password thereafter if you wish.!
	        
	        ------------------------
	        New Password: '.$data['password'].'
	        ------------------------
	                
	        ';

	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
           return Mail($to, $subject, $message, $headers);
	    }

	    /**
	     * Delivers accepted notification offer email.
	     *
	     * @param  $userEmail, $data
	     * @return void
	     */
	    public static function sendAcceptNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Offer  Notification'; // Give the email a subject 
	        $message = '
	        Your offer has been accepted by '.$data['name'].' 
	        Your should proceed to amke payment on or before 48 hours,
	        after which your offer maybe concelled without payment. Login to the app
	        to get more details. Thanks.

	        Bido Team !!!
	               
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
	    }

	      /**
	     * Delivers accepted notification offer email.
	     *
	     * @param  $userEmail, $data
	     * @return void
	     */
	    public static function sendDeclineNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Offer  Notification'; // Give the email a subject 
	        $message = '
	        Your offer has been decline by '.$data['name'].' vendor.
	        Your offer may have been decline because of '.$data['decline_reason'].' .
	        If you are still interested in offering the job to thesame vendor then you may
	        edit the offer and re-offer. Thanks.

	        Bido Team !!!
	               
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
	    }

	      /**
	     * Delivers accepted notification offer for
	     * bidded job
	     *
	     * @param  $userEmail, $data
	     *
	     * @return void
	     */
	    public static function sendBidNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Offer  Notification'; // Give the email a subject 
	        $message = '
	        Your application has been accepted by '.$data['name'].'.
	        We would notify you to start the job once the payment is made. Thanks.

	        Bido Team !!!
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
	    }

	       /**
	     * Delivers accepted notification offer for
	     * bidded job
	     *
	     * @param  $userEmail, $data
	     *
	     * @return void
	     */
	    public static function sendPaymentNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Job Payment Notification'; // Give the email a subject 
	        $message = '
	        Prior to the offer you accepted from '.$data['name'].'.
	        The payment for the job has been made fully and you are to start the job immediately.
	        The money will be transfered to you immediately the job is complete and confirmed by your client.
	        Failure to deliver on the aggreed date will lead to cancellation of the contract and the money returned 
	        to the client. Please do not hesitate to inform us if there is any issue. Goodluck !!!

	        Bido Team !!!
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
	    }

	       /**
	     * Delivers completed job notification
	     *
	     * @param  $userEmail, $data
	     *
	     * @return void
	     */
	    public static function sendJobCompletedNotification($userEmail, $data)
	    {
	        //$this->to = $agencyEmail;
	        $to      = $userEmail; // Send email to our user
	        $subject = 'Bido - Job Completed Notification'; // Give the email a subject 
	        $message = '
	        '.$data['name'].' just informed us that the job you offered her has been completed.
	        And we want your confirmation before we pay him. If there is any issue you let us know before we pay him 
	        if non we would pay him after 24 hour of this mail. Thank you for using Bido.

	        Bido Team !!!
	        ';          
	        $headers = 'From:Bido<askbido@gmail.com>' . "\n"; // Set from headers
	       return Mail($to, $subject, $message, $headers);
	    }

}
