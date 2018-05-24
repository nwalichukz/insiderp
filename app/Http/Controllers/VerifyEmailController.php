<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VerifyEmail;

class VerifyEmailController extends Controller
{
    /**
    * verifies users
    *
    * @var user_id, $token
    * @return response
    */
    public static function VerifyEmail($user_id, $token)
    {
      $verify = VerifyEmail::where('user_id', $user_id);
      $delete = $verify->delete();
      $mainverify = $verify->where('token', $token)->first();
      if(!empty($mainverify))
      {
      	$mainverify->status = 'verified';
      	$mainverify->save();
      }
      return true;
    }
}
