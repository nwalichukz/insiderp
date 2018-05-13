<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostJobController;
use App\Bidding;
use App\Service;
use App\PostJob;
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
    * @return respnse
    *
    */
      public static function deleteBid($id){
        $delete = Bidding::where('id', $id)->delete();
      }
}
