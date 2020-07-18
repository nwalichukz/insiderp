<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
     /**
    * creates the post
    *
    * @var request
    *
    * @var respose
    */
    public static function create(Request $request)
    {  $create = new Comment;
       $create->post_id = $request['post_id'];
       $create->comment = $request['comment'];
       $create->status = 'active';
       $create->email = $request['email'];
       $create->name = $request['name'];
       if(Auth::check()){
       $create->user_id = Auth::user()->id;
        }
       $create->save();
       return true;
    }

     /**
    * returns a aprticular post
    *
    * @var id
    *
    * @var instance
    */
    public static function get($id)
    {
    	return Comment::where('status', 'active')->where('id', $id)->first();
    }

     /**
    * returns all the post
    *
    * @var collection
    */
    public static function getAll()
    {
    	return Comment::where('status', 'active')->paginate(15);
    }

     /**
    * deletes a post
    *
    * @var id
    *
    * @var response
    */
    public static function delete($id)
    {
    	return Comment::where('id', $id)->delete();
    }


    /**
    * updates a aprticular post
    *
    * @var request
    *
    * @var instance
    */
    public static function update(Request $request){
    	return Comment::where('id', $request['id'])->update($request->all())->save();
    }

     /**
    * adds to rank
    *
    * @var request
    *
    * @var instance
    */
    public static function rank($id){
        $add = Comment::where('id', $id)->first();
        $add->comment_rank = $add->comment_rank + 1;
        $add->save();
    }

     /**
    * derank to rank
    *
    * @var request
    *
    * @var instance
    */
    public static function deRank($id){
        $add = Comment::where('id', $id)->first();
        $add->comment_rank = $add->comment_rank - 1;
        $add->save();
    }

    /**
    * get the relevant comments
    *
    * @var request
    *
    * @var instance
    */
    public static function getRelevantComment(){
        return Comment::where('status', 'active')->orderBy('comment_rank', 'DESC')->limit(2)->get();
        
    }
}
