<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\mailer;
use App\Http\Controllers\ServiceController;
use App\Vendor;
use App\User;
use App\UserAvater;

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
        $emaildata = ['password'=> $request['password'],
                    'phone_no' => $request['phone_no'],
                    'name' => $request['name'],
                    ];
        if(!empty($request['email']))
        {
            mailer::emailNotification($request['email'], $emaildata);
        }
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
        
            $user = User::where('phone_no', $request['phone_no'])
                        ->where('password', bcrypt($request['old_password']))->first();
            if($user)
            {
                $user->password = bcrypt($request['new_password']);
                $user->save();
            }
      }
}
