<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
class AdminController extends Controller
{
     /**
    * This method returns a certian service
    *
    */
     public static function getAll(){
     	return Service::where('*')
     					->with('vendor')
     					->with('user')
     					->with('view')->get();
     }

}
