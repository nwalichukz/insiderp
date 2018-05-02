<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\JobOfferDetailController;
use App\PostJob;
use App\Service;
use Auth;

class PostJobController extends Controller
{
    /**
    * post a job for the artisans
    *
    * @var request
    */
    public static function create(Request $request)
    {
        $postjob = new PostJob;
        $postjob->name = $request['name'];
        $postjob->user_id = Auth::user()->id;
        $postjob->offer_amount = $request['budget'];
        $postjob->commission = JobOfferDetailController::commission($request['budget']);
        $postjob->total_amount = $postjob->offer_amount + $postjob->commission;
        $postjob->status = 'available';
        $postjob->job_category = $request['job_category'];
        $postjob->job_description = $request['job_description'];
        $postjob->save();
         return true;
    }
     /**
    * returns a job that are availabe
    *
    */
     public static function getAvailableJob()
     {  $category = Service::where('user_id', Auth::user()->id)->first();
     	return PostJob::where('status', 'available')
                        ->where('job_category', $category->service_category)->paginate(10);
     }

    
    /**
    * changes the status of a posted job
    *
    * @var id
    */
    public static function changeStatus(Request $request)
    {
    	$change = PostJob::find($request['id']);
    	$change->status = $request['status'];
    	$change->save();
    }

     /**
    * deletes a job
    *
    * @var id
    */
     public static function delete($id)
     {
     	return PostJob::where('id', $id)->delete($id);
     }

}
