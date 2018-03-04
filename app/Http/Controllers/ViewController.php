<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View;
class ViewController extends Controller
{
     /**
    * This method creates a view  to the
    *
    * view table
    *
    * @var property_id
    *
    * @return instance
    */
    public static function create($service_id)
    {
    	$create = new View;
    	$create->service_id = $service_id;
    	$create->view = 0;
    	$create->save();
    }

    /**
    * This method adds a view  to the
    *
    * view table
    *
    * @var property_id
    *
    * @return instance
    */
    public static function add($service_id)
    {
    	$add = View::where('service_id', $service_id)->first();
    	if(!$add)
    	{ 
    	$create = new View;
    	$create->service_id = $service_id;
    	$create->view = 1;
    	$create->save();
    	}else{
    	$add->view = $add->view+1;
    	$add->save();
    		}
    }
}
