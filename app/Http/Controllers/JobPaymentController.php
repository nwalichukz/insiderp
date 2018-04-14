<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JobPayment;
use JobOfferDetail;

class JobPaymentController extends Controller
{
    /**
    * creates a payment status
    *
    * @var id
    * @return response
    */
    public static function create(Request $request, $id=null)
    {  $amount = JobOfferDetail::find($id);
    	if($amount->offer_amount == $request['amount_paid'])
    	{
           $amount_paid = $request['amount_paid'];
           $amount_left = 0;
    	}else{
    		$amount_paid = $request['amount_paid'];
    		$amount_left = $amount->offer_amount - $request['amount_paid'];
    	}
    	$create = new JobPayment;
    	$create->job_offer_detail_id = $id;
    	$create->amount_paid = $amount_paid;
    	$create->amount_left = $amount_left;
    	$create->save();
    	return true;
    }

     /**
    * updates job payment status
    *
    * @var id
    * @return response
    */
     public static function update(Request $request)
     {
     	$update = JobPayment::where('job_offer_detail_id', $request['id'])->first();
     	$update->payment_status = $request['status'];
     	$update->save();
     	return true;

     }
}
