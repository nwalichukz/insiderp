<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\VendorLogo;
use DB;
use Response;
use App\View;

class searchController extends Controller
{
    /**
    * This method searches for
    *
    * services entered by the user
    *
    * @return collection
    * @var request
    */
    public static function search(Request $request)
    { $data = $request->all();
      $title= $data['profession_title'];
     $query = Service::where('profession_title', 'like', '%'.$title.'%')
                        ->orWhere('id', $title)
                        ->orWhere('name', 'like', '%'.$title.'%');
     if(!empty($data['location']))
     {
     	$query->where('location', $data['location']);
     }
     if(!empty($data['service_category']))
     {
     	$query->where('service_category', $data['service_category']);
     }

     $query->orderBy('created_at','DESC')->with('user')->with('view')->with('avater');
     DumpController::dumpSearch($request);

     return ['search' => $query->paginate(12), 'total_search' => $query->count()];

    }

    /**
    * This method searches for
    *
    * services entered by the user
    *
    * @return collection
    * @var request
    */
    public static function fullview($id)
    {   
    	return $view = Service::where('id', $id)
    						->with('user')
    						->with('view')
                            ->with('avater')
    						->with('images')
    						->first();
    }

     /**
    * This method searches for
    *
    * services entered by the user
    *
    * @return collection
    * @var request
    */
     public static function searchCategory($category)
     {
     	 $query = Service::where('service_category', $category)
     			 ->orderBy('created_at','DESC')->with('user')->with('view')->with('avater');
     	return ['search' => $query->paginate(12), 'total_search' => $query->count()];
     }
}
