<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Validator;

class AuthController extends Controller
{
     /**
     * Handles an authentication attempt.
     *
     * @return string
      */

     public static function authenticate(Request $request)
    {
       
         $suspended = ['phone_no'=> $request->input('phone_no'), 'password'=> $request->input('password'), 'status'=>'suspended', 'user_level' =>'user'];
          $banned = ['phone_no'=> $request->input('phone_no'), 'password'=> $request->input('password'), 'status'=>'banned', 'user_level' =>'user'];  

        if(Auth::attempt(['phone_no'=> $request->input('phone_no'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'user']))
        {   LastLoginController::login(Auth::user()->id);
            return 'user';
        }
        elseif(Auth::attempt(['phone_no'=> $request->input('phone_no'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'admin']))
        {   LastLoginController::login(Auth::user()->id);
            return 'admin';
        }
        elseif(Auth::attempt($suspended))
        {
            return 'suspended';
        }
        elseif(Auth::attempt($banned)){
        	return 'banned';
        }
        else{
            return 0;
        }
       
    }
}
