<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostJobController;
use App\Bidding;
use App\Service;
use App\User;
use App\PostJob;
use App\JobOfferDetail;
use Auth;

class BiddingController extends Controller
{
    /**
     * This method makes a bid for a job
     *
     * @param $job_id
     *
     * @return response
     */
    public static function makeBid($job_id)
    {
        $service = Service::where('user_id', Auth::user()->id)->first();
        $checkBid = Bidding::where('service_id', $service->id)->first();
        if(empty($checkBid))
        {
        $makebid = new Bidding;
         $makebid->post_job_id = $job_id;
         $makebid->service_id = $service->id;
         $makebid->status = 'not-offered';
         $makebid->save();
         return true;
     }else{
        return false;
     }
    }


    /**
    * This method returns vendors bidding 
    *
    * for a aprticular job
    *
    * @return collection
    *
    */
    public static function vendorsBidding($id)
    {
       return Bidding::where('post_job_id', $id)->with('service')->with('postJob')->paginate(12);
    }

      /**
    * This method returns job bidding 
    *
    * for a aprticular job
    *
    * @return collection
    *
    */
    public static function jobBidding($service_id)
    {
       return Bidding::where('service_id', $service_id)->with('postJob')->with('service')->paginate(12);
    }

     /**
    * This method accepts vendors bidding 
    *
    * for a aprticular job
    *
    * @return respnse
    *
    */
     public static function acceptBid($job_id, $bid_id){
     $job = PostJob::find($job_id);
     $job->status = 'unavailable';
     $job->save();
     $bid = Bidding::find($bid_id);
     $bid->status = 'offered';
     $bid->save();
     $job_detail = new JobOfferDetail;
     $job_detail->user_id = $job->user_id;
     $job_detail->serivce_id = $bid->service_id;
     $job_detail->job_name = $job->name;
     $job_detail->offer_amount = $job->budget;
     $job_detail->commission = $job->commission;
     $job_detail->total_amount = $job->total_amount;
     $job_detail->duration = $job->duration;
     $job_detail->description = $job->job_description;
     $job_detail->job_category = $job->job_category;
     $job_detail->save();
     $create = new JobApproval;
     $create->job_offer_detail_id = $job_detail->id;
     $create->approval_status = 'accepted';
     $create->save();
     $JobProgress = new JobProgress;
     $JobProgress->job_offer_detail_id = $job_detail->id;
     $JobProgress->save();
     $userdetail = User::find($job_detail->user_id);
     $service = Service::find($job_detail->service_id);
     $user = User::find($service->user_id);
     $data = ['name'=>$userdetail->name, 'job_name' => $job_detail->job_name];
     mailer::acceptApplicationNotification($user->email, $data);
     return true;
     }

      /**
    * This method cancels vendors bidding 
    *
    * for a aprticular job
    *
    * @return respnse
    *
    */
     public static function cancelBid($job_id, $bid_id){
     $job = PostJob::find($job_id);
     $job->status = 'available';
     $job->save();
     $bid = Bidding::find($bid_id);
     $bid->status = 'not-offered';
     $bid->save();
     return true;
     }

    /**
    * This method deletes a bid 
    *
    * for a aprticular job
    *
    * @return bool
    *
    */
      public static function deleteBid($id){
        $delete = Bidding::where('id', $id)->delete();
        return true;
      }
}
