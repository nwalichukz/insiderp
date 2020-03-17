<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
    * This method creates a user
    *
    * @return response
    *
    * @var request
    */
   public static function create(Request $request){
   	$create = new User;
   	$create->name = $request['name'];
   	$create->password = bcrypt($request['password']);
   	$create->user_level = 'admin';
   	$create->status = 'active';
   	$create->user_name = $request['user_name'];
   	$create->email = $request['email'];
    $create->description = $request['description'];
   	$create->save();
    return true;
   }

    /**
    * This method returns a user
    *
    * @return response
    *
    * @var id
    */
    public static function get($id){
    	return User::where('id', $id)->first();
    }

    /**
    * This method returns a user 
    *
    * by user_name
    *
    * @return response
    *
    * @var id
    */
    public static function getByUserName($user_name){
      return User::where('user_name', $user_name)->first();
    }

     /**
    * This method deletes a user
    *
    * @return response
    *
    * @var id
    */
     public static function delete($id){
     	return User::where('id', $id)->delete();
     }

     /**
    * This method returns all user
    *
    * @return collection
    *
    */
     public static function getAll(){
     	return User::where('status', 'active')->orderBy('created_at', 'DESC')->paginate(25);
     }

      /**
    * This method returns the number of users
    *
    * @return collection
    *
    */
     public static function countUser(){
      return User::where('status', 'active')->count();
     }

    /**
    * This method returns all user
    *
    * @return collection
    *
    */
     public static function getAllUser(){
      return User::where('status', 'active')->get();
     }

     /**
    * This method returns all blocked user
    *
    * @return collection
    *
    */
     public static function getAllBlocked(){
      return User::where('status', '!=', 'active')->orderBy('created_at', 'DESC')->paginate(20);
     }

     /**
    * This method updates a user
    *
    * @return collection
    *
    */
      public static function update(Request $request){
      	$user = User::find($request['id']);
        if(!empty($request['editname']))
        {
          $user->name = $request['editname'];
        }
         if(!empty($request['email']))
        {
          $user->email = $request['email'];
        }

         if(!empty($request['user_name']))
        {
          $user->user_name = $request['user_name'];
        }
          if(!empty($request['user_level']))
        {
          $user->user_level = $request['user_level'];
        }

          if(!empty($request['status']))
        {
          $user->status = $request['status'];
        }
        $user->save();
      }


    /**
    * This method change a user password
    * @var id
    */
      public static function changePassword(Request $request)
      {   $user = User::where('email', Auth::user()->email)
                        ->where('password', bcrypt($request['oldpassword']))->first();
            if(!empty($user))
            {
                $user->password = bcrypt($request['newpassword']);
                $user->save();
                return true;
            }else{
              return false;
            }
      }

    /**
    * This method checks for unique user name
    * @var id
    *
    **/
    public function checkUnique($name){
      $check = User::where('user_name', $name)->first();
      if(!empty($user)){
        return 'The user name is taken please try another one';
      }else{
        return 'Not taken';
      }

    }


}
