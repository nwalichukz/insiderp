<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostJob;

class PostJobController extends Controller
{
    /**
    * post a job for the artisans
    *
    * @var request
    */
    public static function postJob(Request $request)
    { $postjob = new PostJob;
     $postjob->name = $request['name'];
     $postjob->phone_no = $request['phone_no'];
     $postjob->email = $request['email'];
     $postjob->status = $request['status'];
     $postjob->job_category = $request['job_category'];
     $postjob->description = $request['job_description'];
     $postjob->save();
    }
     /**
    * returns a job that are pending
    *
    */
     public static function getPending()
     {
     	return PostJob::where('status', 'pending')->get();
     }

     /**
    * returns a job by category
    *
    * @var request
    */
     public static function getPendingByCategory($category)
     {
     	return PostJob::where('status', 'pending')
     				    ->where('job_category', $category)->get();
     }
    /**
    * changes the status of a posted job
    *
    * @var id
    */
    public static function changeStatus($id)
    {
    	$change = PostJob::find($id);
    	$change->status = 'done';
    	$change->save();
    }

     /**
    * deletes a job
    *
    * @var id
    */
     public static function delete($id)
     {
     	return PostJob::delete($id);
     }

}
