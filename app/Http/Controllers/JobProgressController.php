<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobProgress;

class JobProgressController extends Controller
{
     /**
    * creates a progress status
    *
    * @var id
    * @return response
    */
    public static function create($id)
    {
    	$create = new JobProgress;
    	$create->job_offer_detail_id = $id;
    	$create->save();
    	true;
    }

     /**
    * updates job progress status
    *
    * @var id
    * @return response
    */
     public static function update(Request $request)
     {
     	$update = JobProgress::where('job_offer_detail_id', $request['id'])->first();
     	$update->progress_status = $request['status'];
     	$update->save();
     	return true;

     }
}
