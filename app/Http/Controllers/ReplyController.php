<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
     /**
    * This method adds comment reply
    *
    */
    public static function postComment()
    { $reply = new ReplyController;
      $reply->user_id = $request['user_id'];
      $reply->service_id = $request['service_id'];
      $reply->comment_id = $request['comment_id'];
      $reply->reply = $request['reply'];
      $reply->save();
    }
}
