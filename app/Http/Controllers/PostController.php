<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use App\UserImage;
use App\User;
use Auth, DB, Mail;
use App\View;
use App\Http\Controllers\ViewController;

class PostController extends Controller
{
    /**
    * creates the post
    *
    * @var request
    *
    * @var respose
    */
    public static function create(Request $request)
    {  $create = new Post;
       $create->post = $request['post'];
       $create->category = $request['category'];
       $create->status = 'active';
       $create->user_id = Auth::user()->id;
       $create->publisher_level = Auth::user()->user_level;
       $create->title = $request['title'];
       if(Auth::user()->user_level === 'admin' || Auth::user()->user_level === 'editor')
        {$create->post_importance = 'front-page';}else{$create->post_importance = 'normal';}
       $create->save();
       PostViewController::create($create->id);
       return ['success'=>'true', 'id' =>$create->id];
    }

     /**
    * returns a aprticular post
    *
    * @var id
    *
    * @var instance
    */
    public static function get($id)
    {   //PostViewController::add($id);
    	return Post::where('status', 'active')->where('id', $id)->first();
    }

     /**
    * returns all the post
    *
    * @var collection
    */
    public static function getAll()
    {
    	return Post::where('status', 'active')->paginate(35);
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
    	return Post::where('id', $id)->delete();
    }

      /**
    * deletes a post
    *
    * @var id
    *
    * @var response
    */
    public static function blockPost($id)
    {   $blocked = Post::where('id', $id)->first();
        $blocked->status = 'blocked';
        $blocked->save();
        return true;
    }

       /**
    * deletes a post
    *
    * @var id
    *
    * @var response
    */
    public static function unBlockPost($id)
    {   $blocked = Post::where('id', $id)->first();
        $blocked->status = 'active';
        $blocked->save();
        return true;
    }

    /**
    * blocked post
    *
    * @var response
    */
    public static function blockedPost()
    {
        return Post::where('status', '!=', 'active')->paginate(30);
    }

       /**
    * returns a aprticular post by category
    *
    * @var category
    *
    * @var instance
    */
    public static function getByCategory($category)
    {
    	return Post::where('status', 'active')->where('category', $category)
                ->orderBy('created_at', 'DESC')->paginate(35);
    }

    /**
    * updates a aprticular post
    *
    * @var request
    *
    * @var instance
    */
    public static function update(Request $request){
    	$edit = Post::find($request['id']);
        if(!empty($request->title)){
            $edit->title = $request['title'];
        }

          if(!empty($request->post)){
            $edit->post = $request['post'];
        }

          if(!empty($request->category)){
            $edit->category = $request['category'];
        }

          if(!empty($request->post_importance)){
            $edit->post_importance = $request['post_importance'];
        }

         if(!empty($request->voting_status)){
            $edit->voting_status = $request['voting_status'];
        }
        $edit->save();

        return true;
    }

     /**
    * adds to rank
    *
    * @var request
    *
    * @var instance
    */
    public static function rank($id){
        $add = Post::where('id', $id)->first();
        $add->rank = $add->rank + 1;
        $add->save();
    }

      /**
    * get lead story
    *
    * @var request
    *
    * @var instance
    */
    public static function leadStory(){
    return Post::where('post_importance', 'lead')->latest()->first();
       
    }


     /**
    * gets the trendig
    *
    * @var request
    *
    * @var instance
    */
    public static function deRank($id){
        $add = Post::where('id', $id)->first();
        $add->rank - 1;
        $add->save();
    }

    /**
    * adds to rank
    *
    * @var request
    *
    * @var instance
    */
    public static function getLatest(){
        return Post::where('status', 'active')->where('post_importance', 'front-page')->where('category', '!=', 'Job')->orderBy('created_at', 'DESC')
                       ->limit(1000)->paginate(45);
        
    }


    /**
    * gets the featured posts
    *
    * @var request
    *
    * @var instance
    */
    public static function featuredPost(){
        return Post::where('status', 'active')->where('post_importance', 'featured')->orderBy('created_at', 'DESC')
                       ->limit(3)->get();
        
    }

     /**
    * gets latest
    *
    * @var request
    *
    * @var instance
    */
    public static function getTrending(){
        return Post::where('status', 'active')->orderBy('rank', 'DESC')
                    ->limit(1000)->paginate(35);
        
    }

       /**
    * gets latest
    *
    * @var request
    *
    * @var instance
    */
    public static function getTrendPost(){
        return Post::where('status', 'active')->orderBy('rank', 'DESC')->limit(10)->get();
        
    }
    /**
    * gets post by logined user
    *
    * @var request
    *
    * @var instance
    */
    public static function getByUser($id){
        return Post::where('user_id', $id)->where('status', 'active')->orderBy('created_at', 'DESC')
                                    ->limit(1000)->paginate(30);
    
    }

     /**
    * gets post by user_name
    *
    * @var request
    *
    * @var instance
    */
    public static function getByUserName($user_name){
        $user = UserController::getByUserName($user_name);
        return Post::where('user_id', $user->id)->where('status', 'active')->orderBy('created_at', 'DESC')
                                    ->limit(1000)->paginate(30);
    
    }

    /**
    * gets votes
    *
    * @var request
    *
    * @var instance
    */
    public static function votes(){
        return Post::where('status', 'active')->where('post_importance', 'votes')->orderBy('created_at', 'DESC')
                                                    ->limit(500)->paginate(10);
    
    }

    /**
    * autosuggest ajax
    *
    * @var request
    *
    * @var instance
    */
    public static function autosuggest($title)
    {
        return Post::where('title', 'LIKE', $title.'%')->get();
    }

        /**
    * autosuggest ajax
    *
    * @var request
    *
    * @var instance
    */
    public static function relatedPost($title, $category=null)
    {
        return Post::where('title', 'LIKE', $title.'%')->where('title', '!=', $title)
                    ->orWhere('category', $category)->orderBy('rank', 'DESC')->distinct()->limit(7)->get();
    }


    /**
    * search
    *
    * @var request
    *
    * @var instance
    */
    public static function search($title)
    {
        return Post::where('title', 'LIKE', $title.'%')
                    ->where('status', 'active')->orderBy('rank', 'DESC')->paginate(39);
                       /* ->orWhere('post', 'LIKE', '%'.$title.'%')*/
    }
}
