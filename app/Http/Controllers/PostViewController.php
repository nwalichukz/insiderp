<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostView;

class PostViewController extends Controller
{
      /**
    * This method creates a view  to the
    *
    * view table
    *
    * @var post_id
    */
    public static function create($post_id)
    {
    	$create = new PostView;
    	$create->post_id = $post_id;
    	$create->view = 0;
    	$create->save();
    }

    /**
    * This method adds a view  to the
    *
    * view table
    *
    * @var post_id
    */
    public static function add($post_id)
    {
    	$add = PostView::where('post_id', $post_id)->first();
    	if(!$add)
    	{ 
    	$create = new PostView;
    	$create->post_id = $post_id;
    	$create->view = 1;
    	$create->save();
    	}else{
    	$add->view + 1;
    	$add->save();
    	}
    }
}
