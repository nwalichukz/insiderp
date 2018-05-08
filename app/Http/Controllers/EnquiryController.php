<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Auth;

class EnquiryController extends Controller
{
    /**
    * sends an enquiry to the admin
    *
    */
    public static function sendEquiry(Request $request)
    {
    	$send = new Enquiry;
    	$send->name = $request['name'];
    	$send->email = $request['email'];
    	$send->phone_no = $request['phone_no'];
    	$send->message = $request['message'];
    	$send->save();
    	return true;

    }

     /**
    * returns all the messages for the admin
    *
    */
     public static function getAll()
     {
     	if(Auth::check() && Auth::user()->user_level === 'admin'){
     		return Enquiry::paginate(20);
     	}else{
     		Auth::logout();
     		return redirect('/');
     	}
     }

      /**
    * returns a particular messages for the admin
    *
    */
      public static function getenquiry($id)
      { 	if(Auth::check() && Auth::user()->user_level === 'admin'){
     		return Enquiry::where('id', $id)->first();
     	}else{
     		Auth::logout();
     		return redirect('/');
     	}

      }

     /**
    * deletes a single message
    *
    */

     public static function delete($id)
     { if(Auth::check() && Auth::user()->user_level === 'admin'){
     		return Enquiry::where('id', $id)->delete();
     	}else{
     		Auth::logout();
     		return redirect('/');
     	}


     }
}
