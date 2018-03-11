<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\User;

class UserController extends Controller
{
    /**
    * This method creates user
    *
    */
     public static function create(Request $request, $vendor_id=null)
     {  $user = new User;
     	$user->vendor_id = $vendor_id;
     	$user->name = $request['name'];
     	$user->gender = $request['gender'];
     	$user->phone_no = $request['phone_no'];
     	$user->address = $request['address'];
     	$user->email = $request['email'];
     	$user->location = $request['location'];
     	$user->state = $request['state'];
     	$user->password = bcrypt($request['password']);
     	$user->gender = $request['gender'];
     	$user->save();
     }

     /**
    * This method updates user
    *
    */
     public static function update(Request $request, $id)
     { $update = User::find($id);
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
     	$update->save();

     }

      /**
    * This method retuens a user
    *
    */
     public static function get($id)
     {
     	return User::where('id', $id)->get();
     }
      /**
    * This method deletes a user
    *
    */
     public static function delete($id)
     {
     	return User::where('id', $id)->delete();
     }
}
