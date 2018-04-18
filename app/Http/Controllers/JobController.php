<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JobOfferDetail;
use User;
use Service;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\JobOfferDetailController;

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
    * @var
    * @return collection
    *
    */
    public static function myJob($service_id)
    {
    	return JobOfferDetail::where('service_id', $service_id)->with('job_owner')->with('job_progress')
                                ->with('job_approval')->with('job_payment')->get();
    }
}
