<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\UserAvater;
use App\view;

class AdsController extends Controller
{
    public static function homeAds(){
    	 return $query = Service::inRandomOrder()
    	 						->where('status', 'home-ads')
    	 						->with('user')->with('avater')->with('view')
    	 						->limit(6)->get();
                        
    }
}
