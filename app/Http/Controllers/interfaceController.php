<?php

namespace App\Http\Controllers;

use App\PostJob;
use App\view;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\JobOfferDetailController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\VerifyEmailController;
use Validator;
use Auth;
use App\User;
use App\JobOfferDetail;
use App\UserAvater;
use App\vendor;
use App\Service;
use App\vendorLogo;
use App\Message;
use App\PrevWorkImage;

class interfaceController extends Controller
{   /**
    * this method protects the
    * Auth and returns to home page
    * and logouts out
    *
    */
    public function gateKeeper()
    {
        if(!Auth::check()){
        Auth::logout();
        return redirect('/');
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
        if($auth === 'admin'){
            $vendor =  Auth::user();
          return redirect('admin/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth === 'user') {
            $user = Auth::user();
            //flash('Login Successful')->success();
            return redirect('user/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
        	Auth::logout();
        	flash()->error("Email or Password Incorrect");
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
            $vendor =  Auth::user();
          return redirect('admin/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth === 'user') {
            $user = Auth::user();
            return redirect('user/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
            Auth::logout();
            flash()->error("Email or Password Incorrect");
            return redirect()->back();
        }
   
    }

    /**
     * @method index
     * returns index page
     */
    public function index()
    {
    	$ads =  AdsController::homeAds();
    	return view('index')->with(['homeads' => $ads]);
    }

    /**
     * @method login
     * returns login page
     */
    public function login()
    {
        if (Auth::check())
        {
            return redirect()->back();
        }
        return view('auth.login');
    }

    /**
     * @method register
     * returns register page
     */
    public function register()
    {
        if (Auth::check())
        {
            return redirect()->back();
        }
        return view('auth.register');
    }

    /**
     * @method jobDetail 
     * returns job detail page
     */
    public function jobDetail()
    {
        return view('dashboard.job-detail');
    }

    /**
     * @method about
     * returns about Biddo page
     */
    public function about()
    {
    	return view('pages.about')->with(['title' => 'About Bido']);
    }

    /**
     * @method contact
     * returns contact page
     */
    public function contact()
    {
    	return view('pages.contact')->with(['title' => 'Contact Page | Bido']);
    }

    /**
 * @method terms
 * returns terms page
 */
    public function terms()
    {
        return view('pages.terms')->with(['title' => 'Terms and Conditions | Bido']);
    }

    /**
     * @method terms
     * returns terms page
     */
    public function faqs()
    {
        return view('pages.faqs')->with(['title' => 'Frequently asked questions | Bido']);
    }
 /**
 * This method
 *
 * returns collecion
 */
 public function suspendedBanned($id)
 {  $msg = Offender::where('service_id', $id)->first();
    return view('pages.suspended-banned')->with(['message'=>$msg]);
 }
 /**
 * This method
 *
 * returns collecion
 */
 public function userDashboard()

 {  if(Auth::check() AND Auth::user()->user_level === 'user'){
    $user = Auth::user();
    $service = ServiceController::getUserService($user->id);
    if(!empty($service))
    {
    $ongoing = JobController::ongoingJobsCount($service->id);
    $completed = JobController::completedJobsCount($service->id);
        }else{
            $ongoing = 0;
            $completed = 0;
        }
    return view('dashboard.index')->with(['user' => $user, 'service' => $service, 'images' =>$service['images'], 'ongoing' => $ongoing, 'completed' => $completed]);
    }
    else
    {
     Auth::logout();
     return redirect('/');
    }

 }
/**
 * This method returns the admin page
 *
 * returns collecion
 */
 public function adminDashboard()
 { if(Auth::check() && Auth::user()->user_level === 'admin'){
     $admin = AdminController::get(Auth::user()->id);
     $users = User::all();
    return view('admin.dashboard')->with(['admin'=>$admin, 'users' => $users, 'total_user' => $users->count()]);
    } else
    {
     Auth::logout();
     return redirect('/');
    }
 }
/*
**
* This method returns the admin vendors page
*
* returns collecion
*/
    public function adminVendors()
    {  if(!Auth::check() && Auth::user()->user_level !== 'admin'){
         Auth::logout();
         return redirect('/');  
         }
        $admin = AdminController::get(Auth::user()->id);
        $vendors = Service::all();
        return view('admin.vendors')->with(['admin'=>$admin, 'vendors' => $vendors, 'total_vendor' => $vendors->count()]);

    }
    /**
     * This method returns the admin user detail page
     *
     * returns collection
     */
    public function adminUserDetails($user)
    {  if(!Auth::check() && Auth::user()->user_level !== 'admin'){
         Auth::logout();
         return redirect('/');  
         }
        $admin = AdminController::get(Auth::user()->id);
        $user = User::findOrFail($user);
        return view('admin.user-details')->with(['admin'=>$admin, 'user' => $user]);

    }

    /**
     * This method returns the admin job offers page
     *
     * returns collection
     */
    public function adminJobOffers()
    {   if(!Auth::check() && Auth::user()->user_level !== 'admin'){
         Auth::logout();
         return redirect('/');  
         }
        $admin = AdminController::get(Auth::user()->id);
        $jobs = JobController::allJobs();


        return view('admin.job-offers')->with(['admin'=>$admin, 'jobs' => $jobs]);

    }

    /**
     * This method returns the admin ongoing jobs page
     *
     * returns collection
     */
    public function adminJobsOngoing()
    {   if(!Auth::check() && Auth::user()->user_level !== 'admin'){
         Auth::logout();
         return redirect('/');  
         }
        $admin = AdminController::get(Auth::user()->id);
        $jobs = JobController::allJobs();
        return view('admin.jobs-ongoing')->with(['admin'=>$admin, 'jobs' => $jobs]);

    }

    /**
     * This method returns the admin jobs completed page
     *
     * returns collection
     */
    public function adminJobsCompleted()
    {   if(!Auth::check() && Auth::user()->user_level !== 'admin'){
         Auth::logout();
         return redirect('/');  
         }
        $admin = AdminController::get(Auth::user()->id);
        $jobs = JobController::allJobs();
        return view('admin.jobs-completed')->with(['admin'=>$admin, 'jobs' => $jobs]);

    }

    /**
     * This method returns the suspended users page
     *
     * returns collection
     */
     public function suspendedUsers()
     {
         return view('admin.suspended');
     }

    /**
     * This method returns the admin users page
     *
     * returns collection
     */
    public function adminUsers()
    {
        return view('admin.admins');
    }
    /**
     * This method returns the admin page
     *
     * returns collecion
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
 public function registerVendor(Request $request)
 {   
     $this->validate($request,
        [  'email'=>'unique:users',
           'name'=>'required',
           'state'=>'required',
           'phone_no'=>'required|numeric',
           'password' => 'required|string|min:6|confirmed',
           ]);
 
            $user = UserController::create($request);
            
            if($user)
            {
                flash("Account created successfully, login with the password and email", "Bido")->success();
                return redirect('/signin');

            }else{
                flash('Something went wrong user could not be created', 'Bido')->error();
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
     public function registerVendorModal(Request $request)
 {   
     $this->validate($request,
        [  'email'=>'unique:users',
           'name'=>'required',
           'state'=>'required',
           'phone_no'=>'required|numeric',
           'password' => 'required|string|min:6|confirmed',
           ]);
 
            $user = UserController::create($request);
            
            if($user)
            {   Auth::attempt(['email'=> $request->input('email'), 'password'=> $request->input('password'),
             'status'=>'active', 'user_level' =>'user']);
                flash("Account created successfully, you can now continue", "Bido")->success();
                return redirect()->back();

            }else{
                flash('Something went wrong user could not be created', 'Bido')->error();
                return redirect()->back();
            }
 }


 /**
 * This method is for logout
 * 
 *
 */
 public static function logout()
 {
    Auth::logout();
    return redirect('/');
 }

    public function service()
    { $category = ServiceCategoryController::category();
        return view('dashboard.service')->with(['category' => $category]);
    }
/**
 * This method creates a service
 * 
 *
 */
 public function createService(Request $request)
 {      if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $this->validate($request,
        [  'service_name'=>'required',
           'profession_title' => 'required',
           'location'=>'required',
           'description' => 'required',
           ]);

     $service = ServiceController::create($request);
   
   if($request->hasFile('avatar'))
   { $img = ImageController::userImageUpload($request);
     $avater = new UserAvater;
     $avater->user_id = Auth::user()->id;
     $avater->avater = $img;
     $save = $avater->save();
    }
    $userEmail = Auth::user()->email;
    $data = ['name'=>Auth::user()->name, 
             'service_name'=>$request['service_name'],
             ];
    mailer::sendCreateServiceNotification($userEmail, $data);
     if (!empty($service)) {
         flash('Service created successfully', 'All good')->success();
         return redirect('user/'.str_replace(' ', '-', strtolower(Auth::user()->name)));
     } else {
         flash('Something went wrong, service could not be created, please try again')->error();
         return redirect()->back();
     }      
 }
 /**
 * This method creates a search
 * @var $request
 *
 */
 public function postSearch(Request $request)
 {
    $validator = validator::make($request->all(),
        [  'profession_title'=>'required',
           ]);
    $category = ServiceCategoryController::category();
    if($validator->fails()) {
        flash('Please enter service name you want to find')->error();
        return redirect()->back();
    }
    $search = searchController::search($request);
    if($search)
    {
        return view('pages.search-results')->with(['search'=> $search['search'],
                    'total_search'=>$search['total_search'], 'category' => $category]);
    }
 }

  /**
 * This method creates a search
 * @var $request
 *
 */


  public function searchCategory($scategory)
  {    
       $category = ServiceCategoryController::category();
       $search = searchController::searchCategory($scategory);
    if($search)
    {
        return view('pages.search-results')->with(['search'=> $search['search'],
                    'total_search'=>$search['total_search'], 'category' => $category]);

    }else{
        flash('Something went wrong, the system could respond as expected')->error();
        return redirect()->back();
    }
  }
  /**
 * This method creates a search
 * @var id
 *
 */
  public function fullView($id)
  {   $category = ServiceCategoryController::category();
    $fullview = searchController::fullview($id);
    //$related = SearchController::relatedSearch($title);

    if(!empty($fullview))
    {   ViewController::add($id);
        return view('pages.full-view')->with(['fullview' => $fullview, 'category' => $category]);
    }else{
         flash('Something went wrong, the system could respond as expected')->error();
        return redirect()->back();
    }
  }
   /**
 * This method adds avater to the
 * @var request
 *
 */
   public function addAvatar(Request $request)
   {  if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
    $check = ImageController::deleteAvatar(Auth::user()->id); 
    if($check){
    $img = ImageController::userImageUpload($request);
   if($img)
   {
     $avater = new UserAvater;
     $avater->user_id = Auth::user()->id;
     $avater->avater = $img;
     $save = $avater->save();
     if($save)
     {
         flash('Avatar uploaded successfully')->success();
        return redirect()->back();
     }else{
         flash('Something went wrong, image could not be uploaded', 'Try again')->error();
        return redirect()->back();
       
     }

   }
        }else{
           flash('Something went wrong, image could not be uploaded', 'Try again')->error();
        return redirect()->back(); 
        }
   }

      /**
 * This method adds avater to the
 * @var request
 *
 */
      public function addLogoForm()
      {   if(!Auth::check()){
         Auth::logout();
         return redirect('/');  
         }
         $user = Auth::user();
        return view('dashboard.addlogo')->with(['user' => $user]);
      }
     /**
 * This method adds logo to the
 * @var request
 *
 */
   public function addLogo(Request $request)
   { $check = ImageController::deleteLogo($request['id']);
    if($check){  
    $img = ImageController::userImageUpload($request);
   if(!empty($img))
   {
     $avater = new VendorLogo;
     $avater->service_id = $request['id'];
     $avater->logo = $img;
     $avater->save();
     flash('logo uploaded successfully')->success();
     return redirect()->back();
   }else{
        flash('Something went wrong, image could not be uploaded')->error();
        return redirect()->back();
    }
     }else{
          flash('Something went wrong, image could not be uploaded', 'Try again')->error();
        return redirect()->back();
     }
    
   }

/**
 * This method adds prev work images to the
 * @var request
 *
 */
   public function addPrevWorkImg(Request $request)
   {  if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
     $img = ImageController::PrevWorkImg($request->file('files'));
     if($img){
     flash('Image uploaded successfully')->success();
             return redirect()->back();
         }else{
        flash('Something went wrong, image could not be uploaded')->error();
        return redirect()->back();
    }
   }
   /**
 * This method deletes prev work images
 * @var request
 *
 */
public function deletePrevWorkImg($id)
{   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
    $delete = ImageController::deletePrevWorkImg($id);
    if($delete)
    {   flash('Image deleted successfully')->success();
        return redirect()->back();
    }else{
        flash('Something went wrong, image could not be deleted')->error();
        return redirect()->back();
    }

}
   /**
 * This method adds prev work images to the
 * @var request
 *
 */
   public function resetPassword()
   {  return view('pages.password-reset');
   }
/**
 * This method changes password
 * @var request
 *
 */

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

          mailer::sendpasswordreset($request['email'], $data);
          flash('A password has been sent to your email. Please check your email and use it to login')->success();
          return redirect('/');
       
        }else{
        // return response()->json(['error' => 'Email not registered in this platform. Please check if email is correct and try again']);
            flash('Email not registered in this platform. Please check if email is correct and try again')->error();
            return redirect::back();
        }
    }
/**
 * This method changes password
 * @var request
 *
 */
public function changePassword(Request $request)
   { $this->validate($request,
        [  'old_password'=>'required',
           'new_password'=>'required',
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

    public function editProfile()
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $user = Auth::user();
        return view('dashboard.edit_profile', compact(['user']));
   }

    public function updateProfile(Request $request )
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $this->validate($request, [
           'name' => 'required',
           'location' => 'required',
        ]);

            $user_id = Auth::user()->id;

            $update = UserController::update($request, $user_id);
            if ($update)
            {
                flash('Profile Updated Successfully', 'All good!')->success();
                return redirect()->back();
            }
            else
            {
                flash('An error has occured', 'Try again')->error();
                return redirect()->back();
            }

       
   }
/**
* deletes a particular service
* 
* @var id
*/
public function deleteService($id)
{    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
    $delete = ServiceController::delete($id);
    if($delete)
    {
        flash('Service deleted successfully')->success();
        return redirect()->back();
    }else{
        flash('Something went wrong, service could not be deleted successfully, please try again')->error();
        return redirect()->back();
    }
}   
    /**
    * returns instance of a particular service
    * 
    * @var id
    */

    public function editService($id)
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        }  
     $category = ServiceCategoryController::category();
        $service = ServiceController::get($id);
        return view('dashboard.edit_service')->with(['service' => $service])->with(['category' =>$category]);
    }
     /**
    * updates a particular service
    * 
    * @var id
    */
    public function updateService(Request $request)
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $this->validate($request,
        [  'service_name'=>'required',
           'profession_title' => 'required',
           'location'=>'required',
           'service_category' => 'required',
           ]);
   
        $update = ServiceController::update($request);
        if($update)
        {
            flash('Service updated successfully')->success();
            $user = Auth::user();
            $name = str_replace(' ', '-', strtolower($user->name));
            return redirect('user/'.$name);
        }else{
            flash('Something went wrong, service could not be updated successfully, please try again')->error();
             $user = Auth::user();
            $name = str_replace(' ', '-', strtolower($user->name));
            return redirect('user/'.$name);
        }
    
    }

    /**
    * send a mesage to a particular user
    *
    * @var request
    *
    */
   public function sendMessage(Request $request)
   {
        $this->validate($request,
        [  'name'=>'required',
           'title' => 'required',
           'phone_no'=>'required|numeric',
           'message' => 'required',
           ]);
   
        $message = MessageController::sendMessage($request);
        if($message)
        {
        flash('message sent successfully, thanks for contacting the merchant')->success();
        return redirect()->back();
     }else{
         flash('Something went wrong, message not sent successfully please try again')->error();
        return redirect()->back();
     }
  
   }


    public function viewService($id)
    {  
        $service = ServiceController::get($id);
        return view('dashboard.view_service')->with(['service' => $service]);
    }

    /**
    * deletes a mesage of a particular user
    *
    * @var request
    *
    */
    public function deleteMessage($id)
    {
        $message = MessageController::delete($id);
        if($message)
        {
            flash('Message deleted successfully')->success();
            return redirect()->back();
        }else{
            flash('Something went wrong, message could not be deleted, please try again')->error();
            return redirect()->back();
        }
    }

     /**
    * returns a mesage 
    *
    * @var request
    *
    */
     public function getMessage($id)
     {
        $get = MessageController::get($id);
     }

      /**
    * returns all mesages for a user
    *
    * @var request
    *
    */
     public function getUserMessage($id)
     {
        $get = MessageController::getUserMessage($id);
     }

    public function postJob()
    {   $category = ServiceCategoryController::category();
        $user = Auth::user();
        return view('dashboard.post_job')->with(['user' => $user])->with(['category' => $category]);
     }

    public function postJobSave(Request $request)
    {   $this->validate($request,
        [
            'name'=>'required',
            'budget' => 'required|numeric|min:1000',
            'job_description' => 'required',
            'job_category' => 'required',
            'duration' => 'required',
        ]);
   
        $post = PostJobController::create($request);
        if($post){
            flash('Job posted successfully')->success();
            return redirect()->back();
        }else{
           flash('Something went wrong, job not posted successfully')->error();
            return redirect()->back(); 
        }
      
    }

    public function browse_jobs()
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $user = Auth::user();
        $jobs = PostJobController::getAvailableJob();

        return view('dashboard.browse_jobs')->with(['user' => $user, 'jobs' => $jobs]);
    }

    public function makeBid($post_job_id)
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $make_bid = BiddingController::makeBid($post_job_id);

        if ($make_bid)
        {
            flash("You have successfully applied for the job. Please await a response from the job owner")->success();
            return redirect()->back();
        }
        else
        {
            flash("An error has occurred. please try again")->error();
            return redirect()->back();
        }
    }


    public function myJobOffer()
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $jobs = JobController::jobOffer();
        $user = UserController::getUser(Auth::user()->id);

        return view('jobs.index')->with(['jobs' => $jobs, 'user' => $user]);
    }


      public function serviceJobOffers($service_id)
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $jobs = JobController::myJob($service_id);

        return view('dashboard.job-offers')->with(['jobs' => $jobs]);
    }
    public function serviceOngoingJobs($service_id)
    {
        $user = UserController::getUser(Auth::user()->id);
        $jobs = JobController::myJob($service_id);
        //$service = ServiceController::get($user->service->id);

        //dd($jobs);
        return view('dashboard.ongoing-jobs')->with(['user' => $user, 'jobs' => $jobs]);
    }

    public function serviceCompletedJobs($service_id)
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }
        $user = UserController::getUser(Auth::user()->id);
        $jobs = JobController::myJob($service_id);
        //$service = ServiceController::get($user->service->id);

        return view('dashboard.completed-jobs')->with(['user' => $user, 'jobs' => $jobs]);
    }


    public function jobsOngoing()
    {
         if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }
        $jobs_ongoing = $jobs = JobController::jobOffer();


        return view('jobs.jobs-ongoing')->with(['jobs_ongoing' => $jobs_ongoing]);


    }


    public function jobsCompleted()
    {  if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }
        $user = UserController::getUser(Auth::user()->id);
        $jobs_completed = $jobs = JobController::jobOffer();

        return view('jobs.jobs-completed', compact(['user', 'jobs_completed']));
    }
       /**
    * makes an offer to an agent
    *
    * @var request
    * @return response
    */
    public function makeOffer(Request $request)
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
     $this->validate($request,
        [  'job_name'=>'required',
           'offer_amount' => 'required',
           'duration'=>'required',
           'description' => 'required',
           ]);
       $service = Service::find($request['service_id']);
       if($service->user_id == Auth::user()->id)
       {
        flash('Hey sorry you cannot offer a job to yourself')->error();
        return redirect()->back();
       }
        $job = JobOfferDetailController::create($request);
        $jobapproval = JobApprovalController::create($job);
        $jobprogress= JobProgressController::create($job);
        if($jobprogress)
        {
            flash('Your offer has been sent, you will receive a response from the vendor soon, thanks')->success();
            return redirect()->back();
        }else{
            flash('Something went wrong, your offer was not sent, please try again')->error();
            return redirect()->back();
        }
}   

    /**
    * updates the progress of the job to done
    *
    * @var request
    * @return response
    */
 public function jobDone($job_id){
    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }
   $done = JobController::jobDone($job_id);
   if($done){
    flash('Ok, congrats your client would be notified or you can also notify him')->success();
       return redirect()->back();
   }else{
    flash('Something went wrong operation failed, please try again')->success();
       return redirect()->back();
   }
 }
  /**
    * accepts an offer
    *
    * @var job_id
    * @return response
    */
  public function acceptOffer($id){
    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }
    $offer = JobController::acceptOffer($id);
    if($offer){
        flash('Offer accepted successfully, await a response from Bido team when he pays to start the Job')->success();
        return redirect()->back();
    }else{
        flash('Something went wrong operation failed to complete')->error();
        return redirect()->back();
    }
  }

   /**
    * declines an offer
    *
    * @var request
    * @return response
    */
  public function declineOffer(Request $request){
     if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
    $offer = JobController::declineOffer($request);
    if($offer){
        flash('Offer declined successfully')->success();
        return redirect()->back();
    }else{
        flash('Something went wrong operation failed to complete')->error();
        return redirect()->back();
    }
  }

    /**
     * returns all posted jobs
     *
     * @var request
     * @return response
     */
   /* public function myPostedJobs()
    {
        $jobs = PostJobController::getUserJobs();
        return view('dashboard.posted_jobs')->with(['jobs' => $jobs]);
    }*/
    /**
     * returns all applications to job
     *
     * @var request
     * @return response
     */
    public function applications()
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        }   
        $postedjob = PostJobController::getUserJobs();
        return view('dashboard.applications')->with(['jobs' => $postedjob]);
    }
     /**
     * returns a particular posted job by
     * a user
     * 
     * @var id
     * 
     */
    public function editPostedJob($id)
    {    if(!Auth::check()){
        Auth::logout();
        return redirect('/');
        } 
        $category = ServiceCategoryController::category();
        $job = PostJobController::get($id);
        return view('dashboard.editpostedjob')->with(['job' => $job, 'category' => $category]);
    }
     /**
     * updates a posted job by
     * a user
     * 
     * @var id
     * 
     */
     public function updatePostedJob(Request $request)
     {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
        $update = PostJobController::update($request);
        if($update)
        {
            flash('Posted job updated successfully')->success();
            return redirect()->back();
        }else{
            flash('Something went wrong, Posted job not updated successfully. Please try again')->error();
            return redirect()->back();
        }
     }

      /**
     * deletes a posted job by
     * a user
     * 
     * @var id
     * 
     */
      public function deletePostedJob($id)
      {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
        $delete = PostJobController::delete($id);
        if($delete)
        {
             flash('Posted job deleted successfully')->success();
            return redirect()->back();
        }else{
            flash('Something went wrong, Posted job not deleted successfully. Please try again')->error();
            return redirect()->back();
        }
      }

       /**
     * returns applications for a posted job by
     * a user
     * 
     * @var id
     * 
     */
       public function viewApplications($id)
       {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
         $applications = BiddingController::vendorsBidding($id);
         return view('dashboard.view-applications')->with(['application' => $applications]);
       }

       /**
     * accepts applications for a posted job by
     * a user
     * 
     * @var id
     * 
     */
       public function acceptApplication($job_id, $bid_id)
       {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }   
         $accept = BiddingController::acceptBid($job_id, $bid_id);
         if($accept)
         {
            flash('Application accepted successfully')->success();
            return redirect()->back();
         }else{
            flash('Something went wrong, application not accepted successfully')->error();
            return redirect()->back();
         }
       }

     /**
     * cancels applications for a posted job by
     * a user
     * 
     * @var id
     * 
     */
       public function cancelApplication($job_id, $bid_id)
       {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }     
        $accept = BiddingController::cancelBid($job_id, $bid_id);
         if($accept)
         {
            flash('Application offer cancelled successfully')->success();
            return redirect()->back();
         }else{
            flash('Something went wrong, application not cancelled successfully')->error();
            return redirect()->back();
         }

       }

    // sends an enquiry through ajax

    public function sendEquiry(Request $request)
    {
        $msg = MessageController::sendMessage($request);
        if($msg){
            return 'Message sent successfully';
        }else{
            return 'Something went wrong message could not be sent, please try again';
        }
    }
    /**
    * send contact to the admin
    *
    */
    public function ContactUs(Request $request)
    {
        $contact = EnquiryController::sendEquiry($request);
        if($contact)
        {
            flash('Thanks for reaching to us, we would get back to you soon')->success();
            return redirect()->back();
        }else{
            flash('Something went wrong, message could not be sent. Please try again')->error();
            return redirect()->back();
        }
    }

    /**
    * returns all enquiry
    *
    */
    public function getAllEnquiry()
    {
       
     $enquiry = EnquiryController::getAll();
     return view('admin/enquiry')->with(['enquiries' => $enquiry]);

    }

    /**
    * returns a particular enquiry
    *
    */
    public function getEnquiry($id)
    {
       
        return $enquiry = EnquiryController::getenquiry($id);

    }
     /**
    * deletes a particular enquiry
    *
    */
    public function deleteEnquiry($id)
    {
       
         $delete = EnquiryController::delete($id);
         if($delete)
         {
            flash('Enquiry deleted successfully')->success();
            return redirect()->back();
         }else{
            flash('Something went wrong, operation failed. Please try again')->error();
            return redirect()->back();
         }

    }

    public function myApplications()
    {   if(!Auth::check()){
        Auth::logout();
        return redirect('/');
    }     
        $service = ServiceController::getUserService(Auth::user()->id);
        $applications = BiddingController::jobBidding($service->id);

        return view('dashboard.my_applications')->with(['applications' => $applications, 'service' => $service]);

    }
 /**
 *verifies mail
 *
 *@var $user_id, $token
 */
 public function verifyEmail($user_id, $token)
 { 
   $verify = VerifyEmailController::verifyEmail($user_id, $token);
   if($verify)
   {
    flash('User email verified successfully, thanks')->success();
    return redirect('/');
   }else{
    flash('User email verified successfully, thanks')->error();
    return redirect('/');
   }
 }
}
