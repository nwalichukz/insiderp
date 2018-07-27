<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Controllers\ImageController;
use Auth, DB, Mail;
use App\Option;

class OptionController extends Controller
{
    /**
    * This method adds option
    *
    * @return response
    * @var request
    */
    public static function create(Request $request){
    	$create = new Option;
    	$create->name = $request['name'];
    	$create->post_id = $request['id'];
    	$create->description = $request['description'];
    	$create->save();
    	if(!empty($request['image'])){
    	$img = ImageController::optionImageUpload($request);
    	$image = new OptionImage;
    	$image->option_id = $create->id;
    	$image->name = $img;
    	$image->save();
    	}
    	return true;
    }

    /**
    * This method gets an option
    *
    * @return response
    *
    * @var request
    */
    public static function get($id){
      return Option::where('id', $id)->first();
    }

    /**
    * This method deletes an option
    *
    * @return response
    *
    * @var request
    */
    public static function delete($id){
    	return Option::where('id', $id)->delete();
    }
}
