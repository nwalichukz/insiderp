<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    
     /**
     * Handles an authentication attempt.
     *
     * @return string
      */

     public static function authenticate(Request $request)
    {
        if(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'user']))
        {   //LastLoginController::login(Auth::user()->id);
            return 'user';
        }
        elseif(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'admin']))
        {   //LastLoginController::login(Auth::user()->id);
            return 'admin';
        }
        elseif(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'suspended', 'user_level' =>'user']))
        {   Auth::logout();
            return 'suspended';
        }
        elseif(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'banned', 'user_level' =>'user'])){
            Auth::logout();
        	return 'banned';
        }
        elseif(Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'editor']))
        {   //LastLoginController::login(Auth::user()->id);
            return 'editor';
        }
        else{
            return false;
        }
       
    }
}
