<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebViewController;
use App\PostView;
use Auth;
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
    	if(empty($add))
    	{ 
    	$create = new PostView;
    	$create->post_id = $post_id;
    	$create->view = 1;
    	$create->save();
    	}else{
        $add->increment('view'); 
        
        /* $milestone_view = array(25, 50, 51, 75, 100, 125, 150, 200, 250, 300, 450, 500, 600, 700, 800, 900, 1000, 1200, 1500, 1900, 2500, 3000, 4000, 4500, 5000)

        if(in_array($add->view, $milestone_view))
        {
           WebViewController::sendViewNotificationMail($post_id);
        }*/
        }
    PostController::rank($post_id);
    }
}
