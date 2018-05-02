<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ViewController;
use App\Service;
use App\AdditionalService;
use App\User;
use App\View;

class AdditionalServiceController extends Controller
{
    /**
    *
    *
    *
    */
    public static function create($feature, $id)
    {
    	$feature = new AdditionalService;
    	$feature->user_id = $id;
    	//$feature->service_id =
    }
}
