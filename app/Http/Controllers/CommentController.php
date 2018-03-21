<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;
use Validator;
use Comment;

class CommentController extends Controller
{
    /**
    * This method adds comment
    *
    */
    public static function postComment()
    { $comment = new CommentController;
      $comment->user_id = $request['user_id'];
      $comment->service_id = $request['service_id'];
      $comment->comment = $request['comment'];
      $comment->save();

    }
     /**
    * This method return a comment
    *
    */
     public static function get($comment_id)
     {
     	return Comment::where('id', $comment_id)first();
     }
     /**
    * This method updates a comment
    *
    */
    public static function update(Request $request)
    { $comment = Comment::find($request['comment_id']);
    if(!empty($request['comment'])){
      $comment->comment = $request['comment'];
  }
    $comment->save();
       }
    /**
    * This method updates a comment
    *
    */
    public static function delete($id){
    	return Comment::where('id', $id)->delete();
    }
}
