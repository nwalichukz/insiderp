<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ServiceController;
use App\Vendor;
class AdminController extends Controller
{
     /**
    * This method returns a certian service
    * @return collection
    */
     public static function get(){
     	return Service::with('vendor')
     					->with('user')
     					->with('view')
                        ->paginate(10);
     }

}
