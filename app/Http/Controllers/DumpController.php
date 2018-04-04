<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dump;

class DumpController extends Controller
{
    /**
    * dumps the term searched
    * @var Request
    *
    */
    public static function dumpSearch(Request $request)
    {
    	$dump = new dump;
    	$dump->service_name = $request['profession_title'];
    	$dump->location = $request['location'];
    	$dump->category = $request['service_category'];
    	$dump->save();
    }

    /**
    * returns dumped term searched
    * @var search, date
    *
    * @return collection
    */
    public static function get($search, $date=null)
    {
      if(empty($date))
      {
      	return dump::where('service_name', $search)->get();
      }else{
      	return dump::where('service_name', $search)
      				 whereDate('created_at', $date)->get();
      }
    }
}
