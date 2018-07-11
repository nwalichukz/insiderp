<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Post;
use App\Comment;
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
    {
    	return Post::where('status', 'active')->where('id', $id)->first();
    }

     /**
    * returns all the post
    *
    * @var collection
    */
    public static function getAll()
    {
    	return Post::where('status', 'active')->paginate(15);
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
        return Post::where('status', '!=', 'active')->paginate(10);
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
    	return Post::where('status', 'active')->where('category', $category)->paginate(10);
    }

    /**
    * updates a aprticular post
    *
    * @var request
    *
    * @var instance
    */
    public static function update(Request $request){
    	return Post::where('id', $request['id'])->update($request->all())->save();
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
    * adds to rank
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
    public static function getTrending(){
        return Post::where('status', 'active')->orderBy('rank', 'DESC')
                    ->with('comment')->with('postimage')->with('user')
                    ->with('avatar')->limit(50)->paginate(10);
        
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
                         ->with('comment')->with('postimage')->with('user')
                        ->with('avatar')->limit(50)->paginate(10);

    
    }
}
