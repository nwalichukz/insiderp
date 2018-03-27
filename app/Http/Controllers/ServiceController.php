<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ViewController;
use App\Service;
use App\Vendor;
use App\User;
use App\View;
use Auth;


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
    	$service->user_id = Auth::user()->id;
    	$service->name = $request['service_name'];
    	$service->profession_title = $request['profession_title'];
        $service->location = $request['location'];
        $service->service_category = $request['service_category'];
        $service->amount = $request['amount'];
        $service->skills = $request['skills'];
        $service->proficiency = $request['proficiency'];
    	$service->description = $request['description'];
        $service->additional_service = $request['additional_service'];
    	$service->save();
      $view = ViewController::create($service->id);
      if(!empty($request->file('images'))){
      $image = ImageController::userImageUpload($request->file('images'));
      $save = new UserAvater;
      $save->user_id = $service->id;
      $save->name = $image;
      $save->save();
    }

    }

    /**
    * This method returns a certian service
    *
    */
     public static function get($id){
     	return Service::where('id', $id)
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
       	$update = Service::find($request['id']);
       	if(!empty($request['name'])){
       		$update->name = $request['name'];
       	}
          if(!empty($request['tradename'])){
        $update->tradename = $request['tradename'];
        }
          if(!empty($request['amount'])){
        $update->amount = $request['amount'];
        }
          if(!empty($request['skills'])){
        $update->skills = $request['skills'];
        }
          if(!empty($request['proficiency'])){
        $update->proficiency = $request['proficiency'];
        }
       	if(!empty($request['location'])){
       	$update->location = $request['location'];
       	}
       	if(!empty($request['description'])){
       	$update->description =$request['description'];
       	}
          if(!empty($request['service_category'])){
        $update->service_category =$request['service_category'];
        }
       	$update->save();
       	
       }
}
