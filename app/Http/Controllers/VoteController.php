<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Vote;
use Auth;
class VoteController extends Controller
{
    /**
    * creates the votes
    *
    * @var request
    *
    * @var respose
    */
    public static function create(Request $request){
    	$create = new Vote;
    	$create->user_id = Auth::user()->id;
    	$create->post_id = $request['post_id'];
    	$create->option_id = $request['option_id'];
    	$create->save();
    }

     /**
    * get the total votes
    *
    * @var request
    *
    * @var respose
    */
     public static function totalvote($post_id){
      return Vote::where('post_id', $post_id)->count();
     }

      /**
    * get the option votes totla
    *
    * @var request
    *
    * @var respose
    */
     public static function totalvote($post_id, $option_id){
      return Vote::where('post_id', $post_id)->where('option_id', $option_id)->count();
     }
}
