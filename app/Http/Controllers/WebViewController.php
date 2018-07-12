<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostViewController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ViewController;
use Carbon\Carbon;
use App\PostImage;
use App\Post;
use App\User;
use App\Comment;
use App\View;
use App\PostLike;
use App\CommentLike;
use App\UserImage;
use Auth, DB, Mail;

class WebViewController extends Controller
{     //the home page
	public function index(){
    $trending = PostController::getTrending();
     $category = CategoryController::getCategory();
      return view('home')->with(['trending'=>$trending, 'cat'=>$category]);
	}

	/* * This method checks
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	 public function registerUser(Request $request)
		 {   
     $this->validate($request,
        [  'email'=>'unique:users',
           'name'=>'required',
           'password' => 'required|string|min:6|confirmed',
           ]);
 
            $user = UserController::create($request);
            
            if($user)
            {
                flash("Account created successfully, login with the password and email")->success();
                return redirect('/login');

            }else{
                flash('Something went wrong user could not be created')->error();
                return redirect()->back();
            }  
 }

 	 /**
     * This method returns the admin page
     *
     * returns collecion
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function registerUserModal(Request $request)
 {   
     $this->validate($request,
        [  'email'=>'unique:users',
           'name'=>'required',
           'password' => 'required|string|min:6|confirmed',
           ]);
 
            $user = UserController::create($request);
            
            if($user)
            {   Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'),
             'status'=>'active', 'user_level' =>'user']);
                flash("Account created successfully, you can now continue")->success();
                return redirect()->back();

            }else{
                flash('Something went wrong user could not be created')->error();
                return redirect()->back();
            }
 }

     /**
     * This method checks
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
      protected function postLogin(Request $request)
    {   $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|max:255'
        ]);
       
        $auth = AuthController::authenticate($request);
        if($auth === 'main'){
            $vendor =  Auth::user();
            return redirect($vendor->user_level.'/'.str_replace(' ', '-', strtolower($vendor->name)));
          //return redirect($vendor->user_level.'/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth === 'user') {
            $user = Auth::user();
            //flash('Login Successful')->success();
            return redirect($user->user_level.'/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'suspended'){
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
        	Auth::logout();
        	flash("Email or Password Incorrect")->error();
            return redirect()->back();
        }
   
    }

       /**
     * This method logins the user and redirect back
     * to the previous page
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
      protected function postLoginModal(Request $request)
    {   $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|max:255'
        ]);
       
        $auth = AuthController::authenticate($request);
        if($auth === 'admin'){
            return redirect()->back();
        }elseif ($auth === 'user') {
            return redirect()->back();
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
            Auth::logout();
            flash()->error("Email or Password Incorrect");
            // $category = CategoryController::getCategory();
            return redirect()->back();
        }
   
    }
     // register a user
    public static function register(){
      $category = CategoryController::getCategory();
    	return view('pages.register')->with(['cat'=>$category]);
    }

    // signins in a user
    public static function signin(){
      $category = CategoryController::getCategory();
    	return view('pages.signin')->with(['cat'=>$category]);
    }
     // logout
    public static function logout(){
    	Auth::logout();
    	return redirect('/');
    }

     // forgot password
    public static function forgotpassword(){
    	return view('pages.forgot-password');
    }

     // suspended-banned
    public static function suspendedBanned(){
    	return view('pages.suspended-banned');
    }

    // user dashboard
    public static function UserDashboard(){
    	if(Auth::check() AND (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor')){
   		 $user = Auth::user();
   		 $trending = PostController::getTrending();
   		 $category = CategoryController::getCategory();
   		 return view('dashboard.index')->with(['cat' =>$category, 'trending'=>$trending]);

		}else{
      Auth::logout();
      return redirect('/');
    }

    }
    //my post
    public static function myPost($name, $id)
    { 
      if(Auth::check() && (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor')){
        $mypost = PostController::getByUser($id);
        $category = CategoryController::getCategory();
        return view('dashboard.mypost')->with(['trending'=>$mypost, 'cat'=>$category]);
      }
    }

      // suspended-banned
    protected function addPost(Request $request){
    	$this->validate($request,
        [  'post'=>'required',
           'category' => 'required',
           ]);
    	$post = PostController::create($request);
    	if($request->hasFile('image')){
    		$img = ImageController::postImageUpload($request);
    		$postimg = new PostImage;
    		$postimg->post_id = $post['id'];
    		$postimg->name = $img;
    		$postimg->save();
    	}
    	if($post['success'])
    	{
    		flash('post added successfully')->success();
    		return redirect(Auth::user()->name.'/mp-post/'.Auth::user()->id);
    	}else{
    		flash('Something went wrong, post not added successfully. Please try again')->error();
    		return redirect()->back();
    	}
    }

 /**
 * This method changes password
 * @var request
 *
 */
public function changePassword(Request $request)
   { $this->validate($request,
        [  'oldpassword'=>'required',
           'newpassword'=>'required|string|min:6|confirmed',
           ]);
 
   $changepswd = UserController::changePassword($request);
   if($changepswd)
   {
    flash('Password changed successfully')->success();
    return redirect()->back();
   }else{
    flash('Something went wrong, password could noe be changed, please try again')->error();
    return redirect()->back();
   }
}

      // add post likes
      public static function addPostLike($user_id, $post_id){
      	PostLikeController::likePost($user_id, $post_id);
      	return redirect()->back();
      }

       // add ajax post likes
      public static function ajaxAddPostLike(Request $request){
        $post_id = $request['id'];
        PostLikeController::ajaxlikePost($post_id);
      }

      // add user image
      public static function addUserImage(Request $request){
      	if($request->hasFile('avatar')){
      	$img = ImageController::userImageUpload($request);
      	$userimg = new UserImage;
      	$userimg->user_id = Auth::user()->id;
      	$userimg->name = $img;
      	$userimg->save();
      	flash('Image uploaded successfully')->success();
      	return redirect()->back();
      		}else{
      			return redirect()->back();
      		}

      }

      //post comment
      public function postComment(Request $request){
      	$this->validate($request,
        [  'comment'=>'required',
           ]);
      	CommentController::create($request);
      	return redirect()->back();
      }

       //ajax post comment
      // post comment through ajax request
      public function ajaxPostComment(Request $request){
       /* $this->validate($request,
        [  'comment'=>'required',
           ]); */
         CommentController::create($request);
      }

      // return comment for ajax
      public function loadComment()
      {
        return view('partials.main-content');
      }

       // return comment for ajax
      public function blockedPost()
      { 
        $blocked = PostController::blockedPost();
        $category = CategoryController::getCategory();
        return view('dashboard.index')->with(['trending'=>$blocked, 'cat'=>$category]);
      }

      // block post
      public function blockPost($id)
      { // return $id;
       $block = PostController::blockPost($id);
       if($block){
        return redirect()->back();
      }else{
        flash('Something went wrong, post could not be blocked, please try again')->success();
        return redirect()->back();
         } 
      }

       // block post
      public function unBlockPost($id)
      {  return $id;
       $unblocked = PostController::unBlockPost($id);
       if($unblocked){
        return redirect()->back();
      }else{
        flash('Something went wrong, post could not be blocked, please try again')->success();
        return redirect()->back();
         } 
      }

      // return posts by category
      public function getByCategory($category)
      {  $bycat = PostController::getByCategory($category);
         $cat = CategoryController::getCategory();
        return view('home')->with(['trending'=>$bycat, 'category'=>$category, 'cat'=>$cat]);
      }

      // post full view
      public function fullView($id)
      {  $category = CategoryController::getCategory();
        $trend = PostController::get($id);
        PostViewController::add($id);
        return view('pages.full-view-post')->with(['trend'=>$trend, 'cat'=>$category]);
      }


      // get all users
      public function getUsers()
      {  if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
          {
        $user = UserController::getAll();
        $category = CategoryController::getCategory();
        return view('dashboard.users-page')->with(['trending'=>$user, 'cat'=>$category]);
        }
    }


      // get all blocked users
      public function getBlockedUsers()
      {  if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
          {
        $user = UserController::getAllBlocked();
        $category = CategoryController::getCategory();
        return view('dashboard.users-page')->with(['trending'=>$user, 'cat'=>$category]);
        }
    }

      // update user users
      public function updateUser(Request $request)
      {  if(Auth::check())
          {
        $update = UserController::update($request);
        $category = CategoryController::getCategory();
        if($update){
          flash('user updates successfully')->success();
          return redirect()->back();
        }else{
          flash('Something, went wrong user was not updated successfully')->error();
          return redirect()->back();
        }
        
        }
    }

    //delete post
    public function deletePost($id)
    {  return $id;
      if(Auth::check()){
        $delete = PostController::delete($id);
        return redirect()->back();
      }else{
        Auth::logout();
        return redirect()->back();
      }
    }


    //delete comment
    public function deleteComment($id)
    {
      if(Auth::check()){
        $delete = CommentController::delete($id);
        return redirect()->back();
      }else{
        Auth::logout();
        return redirect()->back();
      }
    }

    //send invitation for friends
    public function inviteFriends(Request $request)
    {    if(Auth::check()){
         if(!empty($request['email1'])){
         $delay_one = (new \Carbon\Carbon)->now()->addMinutes(1);
         Mail::to($request['email1'])->later($delay, new CreateServiceMail(Auth::user()->name));
        }

         if(!empty($request['email2'])){
         $delay_two = (new \Carbon\Carbon)->now()->addMinutes(2);
         Mail::to($request['email2'])->later($delay, new CreateServiceMail(Auth::user()->name));
        }

         if(!empty($request['email3'])){
         $delay_one = (new \Carbon\Carbon)->now()->addMinutes(3);
         Mail::to($request['email3'])->later($delay, new CreateServiceMail(Auth::user()->name));
        }
          return redirect()->back();
          flash('Friends invitation sent successfully')->success();
        }else{
          Auth::logout();
          return redirect('/');
          
        }

    }

      // send password reset
     public function postResetPassword(Request $request)
    {   $this->validate($request,
        [  'email'=>'required|email',
          
           ]);
        $sentpassword = mt_rand(100000, 1000000);
        $dbpassword =bcrypt($sentpassword);
        $data = [ 'password' => $sentpassword
                        ];
         $check = User::where('email', $request['email'])->first();
         if($check){
          $check->password = $dbpassword;
          $check->save();
          $data = ['password' => $sentpassword];
         // $check->password = $sentpassword;
          Mail::to($request['email'])->send(new PasswordResetMail($sentpassword));
          return redirect('success-email-sent');
       
        }else{
        // return response()->json(['error' => 'Email not registered in this platform. Please check if email is correct and try again']);
            flash('Email not registered in this platform. Please check if email is correct and try again')->error();
            return redirect::back();
        }
    }

    // password reset success page
    public function SuccessEmail()
   {  
    return view('pages.email-reset-success');
   }

    // return contact us page
    public function contact()
   {  $category = CategoryController::getCategory();
    return view('pages.contactus')->with(['cat'=> $category]);
   }

   // return about us page
    public function about()
     {  $category = CategoryController::getCategory();
    return view('pages.aboutus')->with(['cat'=> $category]);
   }

   // return contact us page
    public function terms()
   {  $category = CategoryController::getCategory();
    return view('pages.terms')->with(['cat'=> $category]);
   }
}
