<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentLike;
use App\Http\Controllers\CommentController;
use Auth;

class CommentLikeController extends Controller
{
    /**
	* likes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/

    public static function likeComment($comment_id){
     $like = CommentLike::where('comment_id', $comment_id)
     				 ->where('user_id', Auth::user()->id)->first();
     if(!$like){
     	$create = new CommentLike;
     	$create->comment_id = $comment_id;
     	$create->user_id = Auth::user()->id;
     	$create->like = $create->like+1;
     	$create->save();
        return redirect()->back();
        //CommentController::rank($comment_id);
     }else{
     	 return redirect()->back();
     }
    }

    /**
	* unlikes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/

    public static function unLikePost($user_id, $comment_id){
     $like = CommentLike::where('comment_id', $comment_id)
     				 ->where('user_id', $user_id)->first();
     if($like){
     	$like->delete();
        CommentController::deRank($comment_id);
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
	public static function getLikes($comment_id){
	 $likes = CommentLike::where('comment_id', $comment_id)->count();
	}
}
