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
       
         $suspended = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'suspended', 'user_level' =>'user'];
          $banned = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'banned', 'user_level' =>'user'];  

        if(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'user']))
        {
            return 'user';
        }
        elseif(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'admin']))
        {
            return 'admin';
        }
        elseif(Auth::attempt($suspended)){
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
