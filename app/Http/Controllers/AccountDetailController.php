<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountDetail;

class AccountDetailController extends Controller
{      /**
    	* creates bank details
    	*
    	* @return response
    	*
    	* @var request
    	*/
   	 public static function create(Request $request)
   		 {  
    	$create = new AccountDetail;
    	$create->user_id = Auth::user()->id;
    	$create->account_name = $request['account_name'];
    	$create->account_number = $request['account_number'];
    	$create->account_type = $request['account_type'];
    	$create->bank = $request['bank'];
    	$create->save();
   		 }
        /**
    	* updates bank detail
    	*
    	* @return response
    	*
    	* @var request
    	*/
    	public static function update(Request $request)
    	{  $account = AccountDetail::where('user_id', $request['user_id'])->first();
    	if(!empty($request['account_name']))
    	{
    		$account->account_name = $request['account_name'];
    	}

    	if(!empty($request['account_number']))
    	{
    		$account->account_number = $request['account_number'];
    	}
    	if(!empty($request['account_type']))
    	{
    		$account->account_type = $request['account_type'];
    	}

    	if(!empty($request['bank']))
    	{
    		$account->bank = $request['bank'];
    	}
    	$account->save();
    	}

    	/**
    	* updates bank detail
    	*
    	* @return collection
    	*
    	* @var id
    	*/
    	public static function get($user_id)
    	{
    		return AccountDetail::where('user_id', $user_id)->first();
    	}

    	/**
    	* deletes a bank detail
    	*
    	* @return response
    	*
    	* @var id
    	*/
    	public static function delete($user_id)
    	{
    		return AccountDetail::where('user_id', $user_id)->delete();
    	}
}
