<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\mailerController;
use App\Vendor;
use App\User;
use App\Message;
use App\Service;

class MessageController extends Controller
{
    /**
    * This method sends a message to a particular user
    *
    * @var id
    *
    */
    public static function sendMessage(Request $request)
    {  
    	$message = new Message;
    	$message->user_id = $request['id'];
    	$message->name = $request['name'];
    	$message->email = $request['email'];
      $message->phone_no = $request['phone_no'];
    	$message->message = $request['message'];
    	$message->status = 'unread';
    	$message->save();
      $data = ['name'=>$request['name'], 'phone'=>$request['phone_no'], 
      'email'=>$request['email'], 'message'=>$request['message'], ];
      mailer::emailEnquiry($request['service_email'], $data);
    	return true;
    }

    /**
    * This method deletes a message 
    *
    * @var id
    *
    */
    public static function delete($id)
    {
    	return Message::where('id', $id)->delete();
    }

     /**
    * returns a particular message 
    *
    * @var id
    *
    */
     public static function get($id)
     {
     	return Message::where('id', $id)->first();
     }

     /**
    * returns message for a user 
    *
    * @var id
    *
    */
      public static function getUserMessage($user_id)
     {
     	return Message::where('user_id', $user_id)->get();
     }
}
