<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOfferDetail;
use App\JobOffer;
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
       $create->save();
       return $create->id;
    }

     /**
    * cancels a job detail
    *
    * @var id
    * @return response
    */
     public static function cancel($id)
     { $cancel = JobOffer::where('job_detail_id', $id)->first();
      $cancel->accept_status = 'canceled';
      $cancel->save();
      return true;
     }

}
