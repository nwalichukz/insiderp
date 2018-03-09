<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Validator;

class VendorController extends Controller
{
    /**
    * This method creates a vendor
    *
    *
    */
    public static function create(Request $request)
    { 
    	$service = new Vendor;
    	$service->tradename = $request['tradename'];
    	$service->description = $request['description'];
    	$service->facebook = $request['facebook'];
    	$service->save();
    }

     /**
    * This method updates vendor
    *  08076153575
    *
    */
     public static function update(Request $request)
     { $update = Vendor::find($request['vendor_id']);
     if(!empty($request['tradename']))
     {
     $update->tradename = $request['tradename'];
     }
     
      if(!empty($request['state']))
     {
     	$update->state = $request['state'];
     }
      if(!empty($request['description']))
     {
     	$update->description = $request['description'];
     }
      if(!empty($request['facebook']))
     {
     	$update->facebook = $request['facebook'];
     }
      if(!empty($request['twitter']))
     {
     	$update->twitter = $request['twitter'];
     }
      if(!empty($request['instagram']))
     {
     	$update->instagram = $request['instagram'];
     }
      if(!empty($request['youtube']))
     {
     	$update->youtube = $request['youtube'];
     }
     if(!empty($request['website']))
     {
        $update->website = $request['website'];
     }
     $update->save();
     }

     /**
    * This method deletes a vendor
    *
    *
    */
     public static function delete($id)
     {
     	return Vendor::where('id', $id)->delete();
     }
     /**
    * This method deletes a vendor
    *
    *
    */
     public static function get($id)
     {
 		return Vendor::where('id', $id)->first();
     }
}
