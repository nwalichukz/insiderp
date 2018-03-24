<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use DB;
use Response;

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
     $query = Service::where('profession_title', 'like', '%'.$title);
     if(!empty($data['location']))
     {
     	$query->where('location', $data['location']);
     }
     if(!empty($data['service_category']))
     {
     	$query->where('service_category', $data['service_category']);
     }
     $query->orderBy('created_at','DESC')->with('logo')->with('view');
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
    						->with('images')
    						->first();
    }
}
