<?php
namespace App;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use DB, Auth;
class HelperClass{

	public function comment($post_id)
	{
		return DB::table('comments')->where('post_id', $post_id)->orderBy('comment_rank', 'DESC')->orderBy('created_at', 'DESC')->limit(2)->get();
	}

	//comment for full page
	public function commentAll($post_id)
	{
		return DB::table('comments')->where('post_id', $post_id)->orderBy('created_at', 'ASC')->paginate(20);
	}

	// the commenter
	public function commenter($user_id)
	{
		return DB::table('users')->where('id', $user_id)->first();
	}

	// the user
	public function user($user_id)
	{
		return DB::table('users')->where('id', $user_id)->first();
	}

	// the user image
	public function userImage($user_id)
	{
		return DB::table('user_images')->where('user_id', $user_id)->first();
	}

	// the post image
	public function postImage($post_id)
	{
		return DB::table('post_images')->where('post_id', $post_id)->get();
	}

    // the post image
    public function postImageFirst($post_id)
    {
        return DB::table('post_images')->where('post_id', $post_id)->first();
    }

	// the comment counter
	public function commentCount($post_id)
	{
		return DB::table('comments')->where('post_id', $post_id)->count();
	}

	// the commenter avatar
	public function commenterAvatar($user_id)
	{
		return DB::table('user_images')->where('user_id', $user_id)->first();
	}

	// the poster avatar
	public function postAvatar($user_id)
	{
		return DB::table('user_images')->where('user_id', $user_id)->first();
	}

	// views for the post
	public function postView($id)
	{
		return DB::table('post_views')->where('post_id', $id)->first();
	}

  // get some words for the body
   function get_words($sentence, $count) {
	  preg_match("/<*(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
	  return $matches[0]. " ...";
	}

	// get some words for title
	 function get_title($sentence, $count) {
	  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
	  return $matches[0];
	}

	 /**
    * gets related posts for a post
    *
    * @var request
    *
    * @var instance
    */
    public static function relatedPost($title)
    {
        return DB::table('posts')->where('title', 'LIKE', $title.'%')
                   				 ->orWhere('title', 'LIKE', '%'.$title.'%')->orderBy('rank', 'DESC')->limit(10)->get();
    }

    /**
	* likes a post by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/
	public static function getLikes($post_id){
	 return PostLike::where('post_id', $post_id)->count();
	}

	 /**
	* likes a comment by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/
	public static function commentLike($comment_id){
	 return CommentLike::where('comment_id', $comment_id)->count();
	}

	/**
	* likes a comment by a user
	*
	* @var user_id, post_id
	*
	* @return response
	*/
	public static function getOption($post_id){
	 return Option::where('post_id', $post_id)->get();
	}

	/**
	* categories
	*
	* @var 
	*
	* @return collection
	*/
	public static function category(){
		return Category::where('id', '!=', null)->get();
	}

}
