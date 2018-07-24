<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	return $create->id;
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
