<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ServiceController;
use App\Vendor;
use App\Service;
class AdminController extends Controller
{
     /**
    * This method returns a certian service
    * @return collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
     public static function get(){
     	return Service::with('user')
     					->with('view')
                        ->paginate(15);
     }

      /**
    * This method returns a certian service
    * @return collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
     public static function getActive(){
        return Service::where('status', 'active')
                        ->with('user')
                        ->with('view')
                        ->paginate(15);
     }

     /**
     * This method makes payment
     *    
     * @var request
     *
     * @return collection
     */
     public static function makePayment(Request $request){


     }

}
