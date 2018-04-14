<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JobOffer;
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
    {

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
    { return JobOffer::where('user_id', Auth::user()->id)->get();
    	
    }

     /**
    * This method returns all the job
    *
    * completed by a particular artisan
    * @var
    * @return collection
    *
    */
    public static function myJob($service_id)
    {
    	return JobOfferDetail::where('service_id', $service_id)->with('job_offer')->get();
    }
}
