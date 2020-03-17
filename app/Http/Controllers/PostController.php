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
       $create->guest_name = $request['guest_name'];
       $create->guest_description = $request['guest_description'];
       if(Auth::user()->user_level === 'admin' || Auth::user()->user_level === 'editor')
        {$create->post_importance = $request['post_importance'];
         }else{
            $create->post_importance = 'normal';
        }
       // $create->post_importance = $request['post_importance'];
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
    	return Post::where('status', 'active')->with(['postimage'])->where('id', $id)->first();
    }

     /**
    * returns posts with images
    *
    * @var id
    *
    * @var instance
    */
    public static function getPost()
    {   //PostViewController::add($id);
    	return Post::where('status', 'active')->with(['postimage'])->limit(8)->get();
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
                            ->orderBy('rank', 'DESC')->with(['postimage'])->skip(1)->take(2)->get();
    }

    /**
    * returns a aprticular post by category
    *
    * @var category
    *
    * @var instance
    */
    public static function getByCategoryFrmThree($category)
    {
        return Post::where('status', 'active')->where('category', $category)
                            ->orderBy('rank', 'DESC')->with(['postimage'])->skip(3)->take(10)->simplePaginate();
    }

    
       /**
    * returns a aprticular latest post by category
    *
    * @var category
    *
    * @var instance
    */
    public static function latestByCategory($category)
    {
    	return Post::where('status', 'active')->where('category', $category)
                ->orderBy('created_at', 'DESC')->with(['postimage'])->latest()->first();
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
    return Post::where('post_importance', 'lead')->with(['postimage'])->latest()->first();
       
    }

      /**
    * get business front
    *
    * @var request
    *
    * @var instance
    */
    public static function businessFront(){
        return Post::where('post_importance', 'business-front')->with(['postimage'])->latest()->first();
           
        }
 /**
    * get business front
    *
    * @var request
    *
    * @var instance
    */
    public static function foreignFront(){
        return Post::where('post_importance', 'foreign-front')->with(['postimage'])->latest()->first();
           
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
        return Post::where('status', 'active')->where('post_importance', 'front-page')
                ->with(['postimage'])->orderBy('created_at', 'DESC')->limit(4)
                ->simplePaginate(4);
        
    }

    public static function getLatestGeneral(){
        return Post::where('status', 'active')->with(['postimage'])->orderBy('created_at', 'DESC')
                      ->limit(1000)->paginate(30);  
                   
    }


    /**
    * gets the featured posts
    *
    * @var request
    *
    * @var instance
    */
    public static function featuredPost(){
        return Post::where('status', 'active')->where('post_importance', 'featured')->orWhere('category', 'Opinion')->with(['postimage'])->orderBy('created_at', 'DESC')
                       ->limit(7)->get();
        
    }

     /**
    * gets the sport posts
    *
    * @var request
    *
    * @var instance
    */
    public static function sportPost(){
        return Post::where('status', 'active')->where('category', 'Sports')->orWhere('category', 'Entertainment')->with(['postimage'])->orderBy('created_at', 'DESC')
                       ->limit(5)->get();
        
    }

    /**
    * gets the Lifestyle posts
    *
    * @var request
    *
    * @var instance
    */
    public static function lifestylePost(){
        return Post::where('status', 'active')->where('category', 'Lifestyle')->orWhere('post_importance', 'featured')->with(['postimage'])->orderBy('created_at', 'DESC')
                       ->limit(5)->get();
        
    }

    /**
    * gets the Foreign posts
    *
    * @var request
    *
    * @var instance
    */
    public static function foreignPost(){
        return Post::where('status', 'active')->where('category', 'Foreign')
                           ->where('post_importance', '!=', 'foreign-front')->with(['postimage'])->orderBy('created_at', 'DESC')
                             ->limit(4)->get();
        
    }

     /**
    * gets the business posts
    *
    * @var request
    *
    * @var instance
    */
    public static function businessPost(){
        return Post::where('status', 'active')->where('category', 'Business')->orWhere('category', 'Entrepreneurship')
                           ->where('post_importance', '!=', 'business-front')->with(['postimage'])->orderBy('created_at', 'DESC')
                             ->limit(4)->get();
        
    }

     /**
    * updates of front page
    *
    * @var request
    *
    * @var instance
    */
    public static function frontPost(){
        $post = Post::where('status', 'active')->where('post_importance', '!=', 'featured')->where('publisher_level', 'admin')
                    ->orWhere('publisher_level', 'editor')->with(['postimage'])->get();
                    foreach ($post as $posts) {
                        $posts->post_importance = 'front-page';
                        $posts->save();
                    }
        return redirect('/');

        
    }

     /**
    * gets latest{popular}
    *
    * @var request
    *
    * @var instance
    */
    public static function getTrending(){
        return Post::where('status', 'active')->with(['postimage'])->orderBy('rank', 'DESC')
                    ->limit(5)->paginate(5);
        
    }

       /**
    * gets latest
    *
    * @var request
    *
    * @var instance
    */
    public static function getTrendPost(){
        return Post::where('status', 'active')->whereDate('created_at', '>=', Carbon::now()->subWeek())->with(['postimage'])
                    ->orderBy('rank', 'DESC')->limit(10)->get();
        
    }
    /**
    * gets post by logined user
    *
    * @var request
    *
    * @var instance
    */
    public static function getByUser($id){
        return Post::where('user_id', $id)->where('status', 'active')->with(['postimage'])->orderBy('created_at', 'DESC')
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
        return Post::where('user_id', $user->id)->where('status', 'active')->with(['postimage'])->orderBy('created_at', 'DESC')
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
        return Post::where('title', 'LIKE', $title.'%')->where('title', '!==', $title)
                    ->orWhere('category', $category)->orderBy('rank', 'DESC')->with(['postimage'])->distinct()->limit(4)->get();
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
                    ->where('status', 'active')->with(['postimage'])->orderBy('rank', 'DESC')->paginate(39);
                       /* ->orWhere('post', 'LIKE', '%'.$title.'%')*/
    }
}
