<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOfferDetail;
use App\JobOffer;
use App\Service;
use App\User;
use Auth, DB;

class JobOfferDetailController extends Controller
{
    /**
    * this creates the job detail
    *
    * @var request
    */
    public static function create(Request $request)
    { 
       $create = new JobOfferDetail;
       $create->user_id = Auth::user()->id;
       $create->service_id = $request['service_id'];
       $create->job_name = $request['job_name'];
       $create->offer_amount = $request['offer_amount'];
       $create->duration = $request['duration'];
       $create->description = $request['description'];
       $create->commission = self::commission($request['offer_amount']);
       $create->save();
       return $create->id;
    }


       /**
    * creates the joboffer
    * @var request
    *
    * @return response
    */
    public static function commission($amount)
    {
      if($amount >= 1000 AND $amount <= 5000)
      {
        return 275;
      }
      elseif($amount > 5000 AND $amount <= 10000)
      {
        return 375;
      }elseif($amount > 10000 AND $amount <= 30000)
      {
        return 475;
      }elseif($amount > 30000 AND $amount <= 50000)
      {
        return 568;
      }elseif ($amount > 50000 AND $amount <= 100000) {
        return 970;
      }elseif ($amount > 100000 AND $amount <= 200000) {
        return 1435;
      }elseif ($amount > 200000 AND $amount <= 500000) {
        return 1780;
      }elseif ($amount > 500000 AND $amount <= 1000000) {
        return 2233;
      }elseif($amount > 1000000){
        return 2780;
      }
    }

}
