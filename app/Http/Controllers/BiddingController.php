<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostJobController;
use App\Bidding;
use App\Service;
use Auth;

class BiddingController extends Controller
{
    /**
     * This method makes a bid for a job
     * @param $job_id
     * @return bool
     */
    public static function makeBid($job_id)
    {
        $service = Service::where('user_id', Auth::user()->id)->first();
        $makebid = new Bidding;
         $makebid->post_job_id = $job_id;
         $makebid->service_id = $service->id;
         $makebid->status = 'not-offered';
         $makebid->save();

         return true;
    }


    /**
    * This method returns vendors bidding 
    *
    * for a aprticular job
    *
    * @return collection
    *
    */
    public static function VendorsBidding($id)
    {
       return Bidding::where('post_job_id', $id)->with('service')->get();
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
       return Bidding::where('service_id', $service_id)->with('postJob')->get();
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

     }

      /**
    * This method cancels a bid 
    *
    * for a aprticular job
    *
    * @return bool
    *
    */
      public static function cancelBid($id){
        $delete = Bidding::where('id', $id)->delete();
        return true;
      }
}
