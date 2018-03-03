<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Validator;

class AuthController extends Controller
{
     /**
     * Handles an authentication attempt.
     *
     * @return Response
     */

     public static function authenticate(Request $request)
    {
       
        $adminCredentials = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'admin']; 
        $normalUserCredentials = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'active', 'user_level' =>'user']; 
         $suspended = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'suspended', 'user_level' =>'user'];
          $banned = ['email'=> $request->input('email'), 'password'=> $request->input('password'), 'status'=>'banned', 'user_level' =>'user'];  

        if (Auth::attempt($adminCredentials))
        {
       return 'admin';

        }elseif(Auth::attempt($normalUserCredentials)){
      return 'user';

        }elseif(Auth::attempt($suspended)){
            return 'suspended';

        }elseif(Auth::attempt($banned)){
        	return 'banned';
        }else{
        	return 0;
        }
       
    }
}
