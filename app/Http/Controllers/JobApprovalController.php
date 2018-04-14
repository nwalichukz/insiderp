<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobApproval;
use DateTime;

class JobApprovalController extends Controller
{
     /**
    * creates approval status
    *
    * @var id
    * @return response
    */
    public static function create($id)
    {
    	$create = new JobApproval;
    	$create->job_offer_detail_id = $id;
    	$create->save();
    	return true;
    }

     /**
    * updates approval status
    *
    * @var id
    * @return response
    */
     public static function update(Request $request)
     {
     	$update = JobApproval::where('job_offer_detail_id', $request['id'])->first();
     	$update->approval_status = $request['status'];
     	$update->save();
     	return true;

     }
}
