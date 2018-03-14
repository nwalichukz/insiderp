<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ViewController;
use App\Service;
use App\Vendor;
use App\User;
use App\View;


class ServiceController extends Controller
{
    /**
    * This method creates a service
    *
    *
    *
    */
    public static function create(Request $request)
    { 
    	$service = new Service;
    	$service->user_id = $request('user_id');
    	$service->vendor_id = $request('vendor_id');
    	$service->name = $request('name');
    	$service->location = $request('location');
      $service->service_category = $request('service_category');
    	$service->description = $request('description');
    	$service->save();
      $view = ViewController::create($service->id);

    }

    /**
    * This method returns a certian service
    *
    */
     public static function get($id){
     	return Service::where('id', $id)
     					->with('vendor')
     					->with('user')
     					->with('view')->first();
     }

    /**
    * This method a certian service
    *
    */
     public static function delete($id){
     	return Service::where('id', $id)->delete();
     }

    /**
    * This method updates a service
    *
    */
       public static function update(Request $request){
       	$update = Service::find($request('id'));
       	if(!empty($request('name'))){
       		$update->name = $request('name');
       	}
       	if(!empty($request('location'))){
       	$update->location = $request('location');
       	}
       	if(!empty($request('description'))){
       	$update->description =$request('description');
       	}
          if(!empty($request('service_category'))){
        $update->service_category =$request('service_category');
        }
       	$update->save();
       	
       }
}
