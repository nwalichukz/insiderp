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
        $postjob->budget = $request['budget'];
        $postjob->duration = $request['duration'];
        $postjob->commission = JobOfferDetailController::commission($request['budget']);
        $postjob->total_amount = $postjob->budget + $postjob->commission;
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
        if (!$category) return redirect()->back();
     	return PostJob::where('status', 'available')
                        ->where('job_category', $category->service_category)
                        ->where('user_id', '!=', Auth::user()->id)->with('user')->paginate(10);
     }

    /**
     * returns a jobs posted by a user
     *
     */
    public static function getUserJobs()
    {
        $jobs = PostJob::where('user_id', Auth::user()->id);
        return $jobs->paginate(10);
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

    /**
    * returns a job
    *
    * @var id
    */
     public static function get($id)
     {
        return PostJob::find($id);
     }

    /**
    * updates a job
    *
    * @var id
    */

    public static function update(Request $request)
    {
        $update = PostJob::find($request['id']);
        if(!empty($request['name']))
        {
            $update->name = $request['name'];
        }
         if(!empty($request['job_category']))
        {
            $update->job_category = $request['job_category'];
        }
         if(!empty($request['job_description']))
        {
            $update->job_description = $request['job_description'];
        }
         if(!empty($request['budget']))
        {
        $update->budget = $request['budget'];
        $update->commission = JobOfferDetailController::commission($request['budget']);
        $update->total_amount = $update->budget + $update->commission;
        }
         if(!empty($request['duration']))
        {
            $update->duration = $request['duration'];
        }
        
        $update->save();
        return true;
    }
}
