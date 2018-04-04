<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LastLogin;
use Auth;

class LastLoginController extends Controller
{
    /**
    * The last date login
    *
    * @var $id
    */
    public static function login($id)
    {
    	$login = new LastLogin;
    	$login->user_id = $id;
    	$login->save();
    }

    /**
    * The last date login
    *
    * @var $id
    */
    public static function getLastLogin($user_id)
    {
    	return LastLogin::where('user_id', $user_id)->last();
    }
}
