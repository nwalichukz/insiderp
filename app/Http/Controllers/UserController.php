<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\mailer;
use App\Vendor;
use App\User;

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
        return 1;
     }

     /**
    * This method updates user
    *
    */
     public static function update(Request $request)
     { $update = User::find($request['id']);
     	if(!empty($request['name']))
     	{
     	$update->name = $request['name'];
     	}
     	 if(!empty($request['address']))
     	{
     	$update->address = $request['address'];
     	}
     	if(!empty($request['gender']))
     	{
     		$update->gender = $request['gender'];
     	}
     	if(!empty($request['location']))
     	{
     		$update->location = $request['location'];
     	}
     	if(!empty($request['phone_no']))
     	{
     		$update->phone_no = $request['phone_no'];
     	}
     	if(!empty($request['state']))
     	{
     		$update->state = $request['state'];
     	}
     	if(!empty($request['email']))
     	{
     		$update->email = $request['email'];
     	}
        if(!empty($request['description']))
        {
            $update->description = $request['description'];
        }
         if(!empty($request['facebook']))
        {
            $update->facebook = $request['facebook'];
        }
         if(!empty($request['twitter']))
        {
            $update->twitter = $request['twitter'];
        }
         if(!empty($request['youtube']))
        {
            $update->youtube = $request['youtube'];
        }
         if(!empty($request['instagram']))
        {
            $update->instagram = $request['instagram'];
        }
     	$update->save();

     }

      /**
    * This method retuens a user
    * @var id
    */
     public static function get($id)
     {
     	return User::where('id', $id)->get();
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
