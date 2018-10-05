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
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ViewController;
use App\Mail\InviteFriendsMail;
use App\Mail\PasswordResetMail;
use App\Mail\ViewNotification;
use App\Mail\contactMail;
use Carbon\Carbon;
use App\PostImage;
use App\Post;
use App\User;
use App\Comment;
use App\View;
use App\PostView;
use App\PostLike;
use App\CommentLike;
use App\UserImage;
use Auth, DB, Mail;


class WebViewController extends Controller
{
 /**
  * This method returns the latest post
  *
  * for the app
  *
  * @return view
  */
	public function latest(){
    $trending = PostController::getTrending();
     $category = CategoryController::getCategory();
     $lead = PostController::leadStory();
     $featured = PostController::featuredPost();
      return view('home')->with(['posts'=>$trending, 'cat'=>$category, 'lead'=>$lead, 'featured'=>$featured, 'topcategory'=>'Trending',
      'fulltitle'=>'Trending - news, opinions, articles, questions, get involved your views matter and help make our society better!']);
	}
    /**
  * This method returns the home page
  *
  * for the app
  *
  */
  public function index(Request $request){
    $trending = PostController::getLatest();
    $trendpost = PostController::getTrendPost();
     $category = CategoryController::getCategory();
     $lead = PostController::leadStory();
     $featured = PostController::featuredPost();
      return view('home')->with(['posts'=>$trending, 'topcategory'=>'Latest', 'cat'=>$category, 'lead'=>$lead, 'featured'=>$featured,
        'trendpost'=>$trendpost]);
  }

  /**
  * posts for a particular user
  *
  * @var $user_name
  *
  */
  public function userPost($user_name){
     $user = UserController::getByUserName($user_name);
     $trending = PostController::getByUserName($user_name);
     $trendpost = PostController::getTrendPost();
     $category = CategoryController::getCategory();
     $lead = PostController::leadStory();
      return view('pages.users-posts')->with(['trending'=>$trending, 'cat'=>$category, 'lead'=>$lead, 'topcategory'=>$user->user_name, 
        'trendpost'=>$trendpost, 'user'=>$user, 'fulltitle'=> $user->user_name.' posts-Bido']);
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
           'user_name' => 'unique:users',
           'password' => 'required|string|min:6|confirmed',
           ]);
 
            $user = UserController::create($request);
            
            if($user)
            {
                //flash("Account created successfully, login with the password and email")->success();
                return redirect('/account-success');

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
           'user_name'=> 'unique:users',
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
        if($auth === 'user'){
            $user =  Auth::user();
            return redirect($user->user_level.'/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'editor') {
            $editor = Auth::user();
            return redirect($editor->user_level.'/'.str_replace(' ', '-', strtolower($editor->name)));
        }elseif ($auth === 'admin') {
            $admin = Auth::user();
            return redirect($admin->user_level.'/'.str_replace(' ', '-', strtolower($admin->name)));
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
            return response()->json(null, 200);
        }elseif ($auth === 'user') {
            return response()->json(null, 200);
        }elseif ($auth === 'editor') {
            return response()->json(null, 200);
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
      $title = "Register";
      $category = CategoryController::getCategory();
    	return view('pages.register')->with(['cat'=>$category, 'title'=>$title]);
    }

    // signins in a user
    public static function signin(){
      $title = "Login";
      $category = CategoryController::getCategory();
    	return view('pages.signin')->with(['cat'=>$category, 'title'=>$title]);
    }
     // logout
    public static function logout(){
    	Auth::logout();
    	return redirect('/');
    }

     // forgot password
    public static function forgotpassword(){
      $title = "Forgot Password";
    	return view('pages.forgot-password')->with(['title'=>$title]);
    }

     // suspended-banned
    public static function suspendedBanned(){
      $title = "Accout suspended or banned";
    	return view('pages.suspended-banned')->with(['title'=>$title]);
    }

    // user dashboard
    public static function UserDashboard(){
    	if(Auth::check() AND (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')){
   		 $trending = PostController::getLatest();
   		 $category = CategoryController::getCategory();
   		 return view('dashboard.index')->with(['cat' =>$category, 'posts'=>$trending]);

		}else{
      Auth::logout();
      return redirect('/');
    }

    }
    //my post
    public static function myPost($name, $id)
    { 
      if(Auth::check() && (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')){
        $mypost = PostController::getByUser($id);
        $category = CategoryController::getCategory();
        return view('dashboard.mypost')->with(['posts'=>$mypost, 'cat'=>$category]);
      }else{
        Auth::logout();
        return redirect()->back();
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
        $name = str_replace(' ', '-', strtolower(Auth::user()->name));
    		return redirect($name.'/my-post/'.Auth::user()->id);
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
   { 
    $this->validate($request,
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
      	if($request->hasFile('avatar') && Auth::check()){
        $check = ImageController::deleteAvatar(Auth::user()->id);
        if($check){
      	$img = ImageController::userImageUpload($request);
      	$userimg = new UserImage;
      	$userimg->user_id = Auth::user()->id;
      	$userimg->name = $img;
      	$userimg->save();
      	flash('Image uploaded successfully')->success();
      	return redirect()->back();
      }else{
        flash('Something went wrong, Image not uploaded successfully')->error();
        return redirect()->back();
      }
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
        return view('dashboard.index')->with(['trending'=>$blocked, 'cat'=>$category, 'title'=>'Blocked posts - Bido']);
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
         $lead = PostController::leadStory();
        return view('home')->with(['posts'=>$bycat, 'category'=>$category, 'cat'=>$cat, 'lead'=>$lead, 'fulltitle'=>$category. ' - Bido']);
      }

      // post full view
      public function fullView($id)
      {  $category = CategoryController::getCategory();
        $trend = PostController::get($id);
        $related = PostController::relatedPost($trend->title, $trend->category);
        PostViewController::add($id);
        return view('pages.full-view-post')->with(['trend'=>$trend, 'cat'=>$category, 'fulltitle'=>$trend->title, 'related'=>$related]);
      }
      // count view
      public function countView(Request $request){
        PostViewController::add($request['id']);
      }

      // get all users
      public function getUsers()
      {  if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
          {
        $users = UserController::getAll();
        $category = CategoryController::getCategory();
        return view('dashboard.users-page')->with(['users'=>$users, 'cat'=>$category]);
        }else{
        Auth::logout();
        return redirect('/');
      }
    }


      // get all blocked users
      public function getBlockedUsers()
      {  if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
          {
        $user = UserController::getAllBlocked();
        $category = CategoryController::getCategory();
        return view('dashboard.users-page')->with(['trending'=>$user, 'cat'=>$category]);
        }else{
        Auth::logout();
        return redirect('/');
      }
    }

      // update user users
      public function updateUser(Request $request)
      {  if(Auth::check())
          {
        $update = UserController::update($request);
        $category = CategoryController::getCategory();
        if($update){
          flash('user updated successfully')->success();
          return redirect()->back();
        }else{
          flash('Something, went wrong user was not updated successfully')->error();
          return redirect()->back();
        }
        
        }else{
        Auth::logout();
        return redirect('/');
      }
    }

    //delete post
    public function deletePost($id)
    { $id_user = PostController::get($id); 
      if(Auth::check() && (Auth::user()->user_level === 'admin' || Auth::user()->id === $id_user)){
        $delete = PostController::delete($id);
        return redirect()->back();
      }else{
        Auth::logout();
        return redirect('/');
      }
    }


    //delete comment
    public function deleteComment($id)
    { $id_user = CommentController::get($id); 
      if(Auth::check() && (Auth::user()->user_level === 'admin' || Auth::user()->id === $id_user)){
        $delete = CommentController::delete($id);
        return redirect()->back();
      }else{
        Auth::logout();
        return redirect('/');
      }
    }

    //send invitation for friends
    public function inviteFriends(Request $request)
    {     $this->validate($request,
        [ 'email1'=>'required|email',
          
           ]);
        if(Auth::check()){
          $delay = (new \Carbon\Carbon)->now()->addSeconds(1);
         if(!empty($request['email1'])){
         
         Mail::to($request['email1'])->send(new InviteFriendsMail(Auth::user()->name));
        }

         if(!empty($request['email2'])){
         
         Mail::to($request['email2'])->send(new InviteFriendsMail(Auth::user()->name));
        }

         if(!empty($request['email3'])){
         
         Mail::to($request['email3'])->send(new InviteFriendsMail(Auth::user()->name));
        }
         flash('Friends invitation sent successfully')->success();
          return redirect()->back();
         
        }else{
          Auth::logout();
          return redirect('/');
          
        }

    }
       // send view notifcation mail
    public static function sendViewNotificationMail($post_id){
      $post = Post::where('id', $post_id)->first();
      $user = User::where('id', $post->user_id)->first();
      $noview = PostView::where('post_id', $post_id)->first();
      $delay = (new \Carbon\Carbon)->now()->addMinutes(1);
      Mail::to($user->email)->later($delay, new ViewNotification($user->name, $post->title, $post_id, $noview->view));
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
    /**
    * This method sends a mail to contact form
    *
    *
    */
    public function sendContact(Request $request){
        $this->validate($request,
        [ 'email'=>'required|email',
          'name'=>'required',
          'subject'=>'required',
          'message' => 'required',          
           ]);
       $delay = (new \Carbon\Carbon)->now()->addMinutes(2);
      Mail::to('askbido@gmail.com')->later($delay, new contactMail($request['name'], $request['email'], $request['subject'], $request['message']));
      return redirect('contact-sent');
    }

    // password reset success page
    public function SuccessEmail()
   {  
    return view('pages.email-reset-success');
   }

    // contact sent page
    public function contactSent()
   {  
    return view('pages.contact-page-thanks');
   }

   // account created success page
    public function accountSuccess()
   {  
    return view('pages.account-created-success');
   }

    // return contact us page
    public function contact()
   {  $title = "Contact us";
   $category = CategoryController::getCategory();
    return view('pages.contactus')->with(['cat'=> $category, 'title'=>$title]);
   }

   // return about us page
    public function about()
    { $title = "About Bido"; 
      $category = CategoryController::getCategory();
    return view('pages.aboutus')->with(['cat'=> $category, 'title'=>$title]);
   }

   // return contact us page
    public function terms()
   { $title = "Terms and Condition";
      $category = CategoryController::getCategory();
    return view('pages.terms')->with(['cat'=> $category, 'title'=>$title]);
   }

   //autosuggest
   public function autosuggest(Request $request){
    $auto = PostController::autosuggest($request['keyword']);
    return view('pages.autosuggest')->with(['words'=>$auto]);
   }

   // search
   public function search(Request $request){
    $search = PostController::search($request['name']);
     $category = CategoryController::getCategory();
     $lead = PostController::leadStory();
      return view('home')->with(['posts'=>$search, 'cat'=>$category, 'lead'=>$lead, 'search'=>$search]);
  }

   // get edit post page
  public function getEditPost($id){
    if(Auth::check() && (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')){
      $edit = PostController::get($id);
      return view('dashboard.edit_post')->with(['data'=>$edit]);
    }else{
      Auth::logout();
      return redirect('/');
    }
  }

  // update post
  public function updatePost(Request $request){
    if(Auth::check() && (Auth::user()->user_level === 'user' || Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')){
    $update = PostController::update($request);
    if($request->hasFile('image')){
        $img = ImageController::postImageUpload($request);
        $postimg = new PostImage;
        $postimg->post_id = $request['id'];
        $postimg->name = $img;
        $postimg->save();
      }
    if($update == true){
      flash('Post updated successfully')->success();
      return redirect(str_slug(Auth::user()->name).'/my-post/'.Auth::user()->id);
       }else{
        flash('Something went wrong, post updated successfully. Please try again')->error();
      return redirect()->back();
       }
    }else{
      Auth::logout();
      return redirect('/');
    }
  }

  //check availabilty
  public function checkAvalability(Request $request){
    return UserController::checkUnique($request['keyword']);
  }

  // get user
  public function getUser($id){
    $user = UserController::get($id);
    $category = CategoryController::getCategory();
    return view('dashboard.edit_user')->with(['user'=>$user, 'cat'=>$category]);
  }

    // get votes
  public function getVote(){
    if(Auth::check() && (Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')){
        $mypost = PostController::votes();
        $category = CategoryController::getCategory();
        return view('dashboard.votes')->with(['trending'=>$mypost, 'cat'=>$category]);
      }else{
        Auth::logout();
        return redirect('/');
      }
  }

  // post like comment
  public function likeComment($comment_id){
   return CommentLikeController::likeComment($comment_id);
  }

  // add option
  public function addOption($id){
    return view('dashboard.add-option')->with(['post_id'=>$id]);
  }

   // post option
  public function postOption(Request $request){
     $this->validate($request,
        [  'name'=>'required',
            'description'=>'required',
          
           ]);
    $create = OptionController::create($request);
    if($create){
      return redirect('/view-votes');
    }
  }
  /**
  * This method adds items to the category
  *
  * table
  *
  *
  */
  public function addSeed(){
    DB::table('categories')->insert([['name' => 'Story', 'created_at'=>Carbon::now(), 'updated_at' => Carbon::now(),],
                                     ['name' => 'Literature Review', 'created_at'=>Carbon::now(), 'updated_at' => Carbon::now(),],
                                          ]);
    return redirect('/');
  }

   /**
  * This method deletes items to the category
  *
  * table
  *
  *
  */
   public function deleteSeed(){
    DB::table('categories')->where('name', 'Literature Review')->delete();
    return redirect('/');
   }

     /**
  * This method thta adds post form
  *
  *
  *
  */
   public function postForm(){
    if(Auth::check()){
      return view('dashboard.add-post');
    }else{
      Auth::logout();
      return redirect('/');
    }
   }
}
