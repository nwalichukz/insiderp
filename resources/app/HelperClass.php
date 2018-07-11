<?php
namespace App;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use DB, Auth;
class HelperClass{

	public function comment($post_id)
	{
		return DB::table('comments')->where('post_id', $post_id)->orderBy('comment_rank', 'DESC')->orderBy('created_at', 'ASC')->limit(2)->get();
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

	function num_of_word($text, $numb) {
	 $wordsArray = explode(" ", $text);
	 $parts = array_chunk($wordsArray, $numb);

	 $final = implode(" ", $parts[0]);

	 if(isset($parts[1]))
	     $final = $final." ...";
	 return $final;
	 }

   function get_words($sentence, $count = 33) {
	  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
	  return $matches[0]. " ...";
	}

}
