<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOffer;
use App\JobOfferDetail;

class JobOfferController extends Controller
{
    /**
    * creates the joboffer
    * @var request
    *
    * @return response
    */
    public static function create(Request $request, $id=null)
    {
    	$job = new JobOffer;
    	$job->user_id = Auth::user()->id;
    	$job->job_offer_detail = $id;
    	$job->commission = self::commission($request['offer_amount']);
    	$job->save();
    }

    /**
    * creates the joboffer
    * @var request
    *
    * @return response
    */
    public static function commission($amount)
    {
    	if($amount >= 1000 || $amount <= 5000)
    	{
    		return 275;
    	}
    	elseif($amount > 5000 || $amount <= 10000)
    	{
    		return 375;
    	}elseif($amount > 10000 || $amount <= 30000)
    	{
    		return 475;
    	}elseif($amount > 30000 || $amount <= 50000)
    	{
    		return 568;
    	}elseif ($amount > 50000 || $amount <= 100000) {
    		return 970;
    	}elseif ($amount > 100000 || $amount <= 200000) {
    		return 1435;
    	}elseif ($amount > 200000 || $amount <= 500000) {
    		return 1780;
    	}elseif ($amount > 500000 || $amount <= 5000) {
    		return 2233;
    	}
    }
}
