<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOfferDetail;
use App\User;
use App\Service;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\JobOfferDetailController;
use App\Http\Controllers\mailer;
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
      public static function acceptOffer($job_id){
        
        $job = JobApproval::where('job_offer_detail_id', $job_id)->first();
        $job->approval_status = $request['status'];
        $job->save();
        $job_detail = JobOfferDetail::find($job->job_offer_detail_id);
        $user = UserController::find($job_detail->user_id);
        $Service = ServiceController::find($job_detail->service_id);
        $data = ['name' => $Service->name,
                    ];
        $useremail = $user->email;
        if($job_detail->duration < 30){
        $job_detail->initial_deliver_date = Carbon::addDays($job_detail->duration);
        }elseif($job_detail->duration == 30){
           $job_detail->initial_deliver_date = Carbon::addMonths(1); 
        }elseif($job_detail->duration == 30){
            $job_detail->initial_deliver_date = Carbon::addMonths(2);
        }
        $job_detail->save();
        // send mail
        mailer::sendAcceptNotification($useremail, $data);
    
      }
      //send mail and notification

    /**
    * This method confirms that the job is done
    *
    *  by a particular user/offerer
    * @var job-offer_detail_id
    *
    * @return collection
    *
    */
    public static function jobDone($id){
     $completed = JobProgess::where('job_offer_detail_id', $id)->first();
     $completed->progress_status = 'completed';
     $completed->save();
      $job_detail = JobOfferDetail::find($completed->job_offer_detail_id);
        $user = UserController::find($job_detail->user_id);
        $Service = ServiceController::find($job_detail->service_id);
        $data = ['name' => $Service->name,
                    ];
        $useremail = $user->email;
        mailer::sendJobCompletedNotification($useremail, $data);
        return true
    }

      //send mail and notification

    /**
    * This method confirms that the job is done
    *
    *  by a particular user/offerer
    * @var job-offer_detail_id
    *
    * @return collection
    *
    */
   public static function DeclineOffer(Request $request){
    $job = JobApproval::where('job_offer_detail_id', $request['job_id'])->first();
        $job->approval_status = $request['status'];
        $job->decline_reason = $request['decline_reason'];
        $job->save();
        ;
        $job_detail = JobOfferDetail::find($job->job_offer_detail_id);
        $user = UserController::find($job_detail->user_id);
        $Service = ServiceController::find($job_detail->service_id);
        $data = ['name' => $Service->name,
                    ];
        $useremail = $user->email;
        mailer::sendDeclineNotification($useremail, $data);

   }
}
