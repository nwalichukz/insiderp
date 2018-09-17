<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\PostLike;
use Auth;

class PostLikeController extends Controller
{  
  /**
	* likes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/

    public static function likePost($user_id, $post_id){
     $like = PostLike::where('post_id', $post_id)
     				 ->where('user_id', $user_id)->first();
     if(!$like){
     	$create = new PostLike;
     	$create->post_id = $post_id;
     	$create->user_id = $user_id;
     	$create->like_post = 1;
     	$create->save();
        PostController::rank($post_id);
     }else{
     	return false;
     }
    }

     public static function ajaxlikePost($id){
     $like = PostLike::where('post_id', $id)
                     ->where('user_id', Auth::user()->id)->first();
     if(!$like){
        $create = new PostLike;
        $create->post_id = $id;
        $create->user_id = Auth::user()->id;
        $create->like_post = 1;
        $create->save();
        PostController::rank($id);
     }else{
        return "You liked this post";
     }
    }

    /**
	* unlikes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/

    public static function unLikePost($user_id, $post_id){
     $like = PostLike::where('post_id', $post_id)
     				 ->where('user_id', $user_id)->first();
     if($like){
     	$like->delete();
        PostController::deRank($post_id);
     }else{
     	return false;
     }
    }

    /**
	* likes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/
	public static function getLikes($post_id){
	 $likes = PostLike::where('post_id', $post_id)->count();
	}
}
