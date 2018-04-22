<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOfferDetail;
use App\User;
use App\Service;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\JobOfferDetailController;
use Auth, DB;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
    * This method returns all the job
    *
    * completed by a particular artisan 
    * @var
    * @return collection
    *
    */
    public static function jobCompleted()
    { return JobOfferDetail::where('user_id', Auth::user()->id)->job_payment()
                                ->where('payment_status', 'paid')->job_approval()
                                ->where('approval_status', 'accepted')->job_progress()
                                ->where('progress_status', 'completed')
                                ->with('job_executor')
                                ->get();

    }

     /**
    * This method returns all the job ongoing
    *
    *  by a particular artisan or a user
    * @var
    * @return collection
    *
    */
    public static function myJobOngoing()
    {
    	return JobOfferDetail::where('user_id', Auth::user()->id)->job_payment()
                                ->where('payment_status', '!=', 'not paid')->job_approval()
                                ->where('approval_status', 'accepted')->job_progress()
                                ->where('progress_status', '!=', 'completed')
                                ->with('job_executor')
                                ->get();
        return DB::table('job_offer_details')
                ->where('user_id', Auth::user()->id)
                ->join('job_payments', 'job_payments.job_offer_detail_id', '=', 'job_payments.job_offer_detail_id')
                ->
    }

     /**
    * This method returns all the job
    *
    * offers placed by a particular user
    * @var
    * @return collection
    *
    */
    public static function jobOffer()
    { return JobOfferDetail::where('user_id', Auth::user()->id)->with('job_executor')->with('job_progress')
                                ->with('job_approval')->with('job_payment')->get();
    	
    }

     /**
    * This method returns all the job
    *
    *  by a particular artisan/vendor
    * @var service_id
    * @return collection
    *
    */
    public static function myJob($service_id)
    {
    	return JobOfferDetail::where('service_id', $service_id)->with('job_owner')->with('job_progress')
                                ->with('job_approval')->with('job_payment')->get();
    }

      /**
    * This method accepts an offer
    *
    *  by a particular user/offerer
    * @var job-offer_detail_id
    *
    * @return collection
    *
    */
      public static function acceptDeclineOffer(Request $request){
        $job = JobApproval::where('job_offer_detail_id', $request['job_id'])->first();
        $job->approval_status = $request['status'];
        $job->decline_reason = $request['decline_reason'];
        $job->save();
        $job_detail = JobOfferDetail::find($job->job_offer_detail_id);
        if($job_detail->duration < 30){
        $job_detail->initial_deliver_date = Carbon::addDays($job_detail->duration);
        }elseif($job_detail->duration == 30){
           $job_detail->initial_deliver_date = Carbon::addMonths(1); 
        }elseif($job_detail->duration == 30){
            $job_detail->initial_deliver_date = Carbon::addMonths(2);
        }
        $job_detail->save();
      }
}
