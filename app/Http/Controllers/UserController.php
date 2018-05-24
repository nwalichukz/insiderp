<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\mailer;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VerifyEmailController;
use App\Mail\signupnotification;
use App\Vendor;
use App\VerifyEmail;
use App\User;
use App\UserAvater;
use Mail;

class UserController extends Controller
{
    /**
    * This method creates user
    *
    */
     public static function create(Request $request)
     {  
        $user = new User;
     	$user->name = $request['name'];
       	$user->gender = $request['gender'];
     	$user->phone_no = $request['phone_no'];
     	$user->email = $request['email'];
     	$user->location = $request['location'];
     	$user->state = $request['state'];
     	$user->password = bcrypt($request['password']);
     	$user->save();

         $token = rand().time();
         $password = $request['password'];
         $name = $request['name'];
         $id = $user->id;
    
        $verify = new VerifyEmail;
        $verify->user_id = $user->id;
        $verify->token = $token;
        $verify->status = 'unverified';
        $verify->save();
        Mail::to($request['email'])->send(new signupnotification($user,$verify));
        return true;
     }

     /**
    * This method updates user
    *
    */
     public static function update(Request $request, $user_id)
     { $user = User::find($user_id);
     	$user->update($request->all());
     	$user->save();
     	return true;
     }

      /**
    * This method retuens a user
    * @var id
    */
     public static function getUser($id)
     {

     	return User::where('id', $id)
                    ->with('avater')->get();
     }
    /**
    * This method deletes a user
    * @var id
    */
     public static function delete($id)
     {
     	return User::where('id', $id)->delete();
     }
      /**
    * This method change a user password
    * @var id
    */
      public static function changePassword(Request $request)
      {
        
            $user = User::where('email', $request['email'])
                        ->where('password', bcrypt($request['old_password']))->first();
            if($user)
            {
                $user->password = bcrypt($request['new_password']);
                $user->save();
            }
      }
}
