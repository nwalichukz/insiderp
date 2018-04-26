<?php

namespace App\Http\Controllers;

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
use Validator;
use Auth;
use App\User;
use App\JobOfferDetail;
use App\UserAvater;
use App\vendor;
use App\Service;
use App\vendorLogo;
use App\Message;

class interfaceController extends Controller
{   

    public static function checkSession()
    {
        if(!Auth::check())
        {   self::logout();
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
        'phone_no' => 'required|min:11',
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
        	flash()->error("Phone number or Password Incorrect");
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
        'phone_no' => 'required|min:11',
        'password' => 'required|max:255'
        ]);
       
        $auth = AuthController::authenticate($request);
        if($auth === 'admin'){
            $vendor =  Auth::user();
          return redirect('admin/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth === 'user') {
            $user = Auth::user();
            return redirect()->back();
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
            Auth::logout();
            flash()->error("Phone number or Password Incorrect");
            return redirect()->back();
        }
   
    }

    /**
     * @method index
     * returns index page
     */
    public function index()
    {
    	$ads = new AdsController;
        // return $ads->getHomePageAds();
    	return view('index');
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
     * @method jobOffers 
     * returns job offers page
     */
    public function offers()
    {
        return view('dashboard.offers');
    }

    /**
     * @method manageApplications
     * returns manage applications page
     */
    public function manageApplications()
    {
        return view('dashboard.applications');
    }

    public function searchpage()
    {
        return view('pages.search-results');
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
    	return view('pages.contact')->with(['title' => 'Contact Page']);
    }

    /**
     * @method terms
     * returns terms page
     */
    public function terms()
    {
    	return view('pages.terms')->with(['title' => 'Terms and Conditions']);
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
    $services = ServiceController::getUserService(Auth::user()->id);
    return view('dashboard.index')->with(['user' => $user, 'services' => $services, 'total'=> $services->count()]);
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
 { if(Auth::check() AND Auth::user()->user_level === 'admin'){
     $admin = AdminController::get(Auth::user()->id);
     $users = User::all();
    return view('admin.dashboard')->with(['admin'=>$admin, 'users' => $users]);
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
    {
        $admin = AdminController::get(Auth::user()->id);
        $vendors = Service::all();
        return view('admin.vendors')->with(['admin'=>$admin, 'vendors' => $vendors]);

    }
    /**
     * This method returns the admin user detail page
     *
     * returns collection
     */
    public function adminUserDetails($user)
    {
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
    {
        $admin = AdminController::get(Auth::user()->id);
        return view('admin.job-offers')->with(['admin'=>$admin]);

    }

    /**
     * This method returns the admin ongoing jobs page
     *
     * returns collection
     */
    public function adminJobsOngoing()
    {
        $admin = AdminController::get(Auth::user()->id);
        return view('admin.jobs-ongoing')->with(['admin'=>$admin]);

    }

    /**
     * This method returns the admin jobs completed page
     *
     * returns collection
     */
    public function adminJobsCompleted()
    {
        $admin = AdminController::get(Auth::user()->id);
        return view('admin.jobs-completed')->with(['admin'=>$admin]);

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
                flash("Account created successfully, login with the password and phone no", "Bido")->success();
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
            {   Auth::attempt(['phone_no'=> $request->input('phone_no'), 'password'=> $request->input('password'),
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
    {
        return view('dashboard.service');
    }
/**
 * This method creates a service
 * 
 *
 */
 public function createService(Request $request)
 {   $this->validate($request,
        [  'service_name'=>'required',
           'profession_title' => 'required',
           'location'=>'required',
           'description' => 'required',
           ]);

     $service = ServiceController::create($request);

     if ($service) {
         flash('Service created successfully', 'All good')->success();
         return redirect()->back();
     } else {
         flash('something went wrong, service could not be created')->error();
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
    if($validator->fails()) {
        flash('Please enter service name you want to find')->error();
        return redirect()->back();
    }
    $search = searchController::search($request);
    if($search)
    {
        return view('pages.search-results')->with(['search'=> $search['search'],
                    'total_search'=>$search['total_search']]);
    }
 }

  /**
 * This method creates a search
 * @var $request
 *
 */

  public function searchCategory($category)
  {
       $search = searchController::searchCategory($category);
    if($search)
    {
        return view('pages.search-results')->with(['search'=> $search['search'],
                    'total_search'=>$search['total_search']]);
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
  {
    $fullview = searchController::fullview($id);
    if(!empty($fullview))
    {   ViewController::add($id);
        return view('pages.full-view')->with(['fullview' => $fullview]);
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
   {$check = ImageController::deleteAvatar(Auth::user()->id); 
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
   { $img = ImageController::prevWorkImg($request);
     if($img){
             $save = new prevWorkImg;
             $save->user_id = Auth::user()->id;
             $save->service_id = $request['service_id'];
             $save->name = $img;
             $save->description = $request['description'];
             $save->save();
             return redirect()->back();
         }else{
        flash('Something went wrong, image could not be uploaded')->error();
        return redirect()->back();
    }
   }
/**
 * This method adds prev work images to the
 * @var request
 *
 */
   public function changePassword(Request $request)
   { $this->validate($request,
        [  'phone_no'=>'required',
           'old_password'=>'required',
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
    {
        $user = Auth::user();
        return view('dashboard.edit_profile')->with(['user' => $user]);
   }

    public function updateProfile(Request $request )
    {
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
{
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
    {
        $service = ServiceController::get($id);
        return view('dashboard.edit_service')->with(['service' => $service]);
    }
     /**
    * updates a particular service
    * 
    * @var id
    */
    public function updateService(Request $request)
    {   $this->validate($request,
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
           'phone_no'=>'required',
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

    public function postJob(Request $request)
    {   $this->validate($request,
        [  'name'=>'required',
           'title' => 'required',
           'phone_no'=>'required',
           'email' => 'required',
           'job_description' => 'required',
           'job_category' => 'required',
           ]);
   
        $post = PostJobController::create($request);
      
    }


    public function myJobOffer()
    {
        $jobs = JobController::jobOffer();
        $user = UserController::getUser(Auth::user()->id);

        return view('jobs.index')->with(['jobs' => $jobs, 'user' => $user]);
    }


      public function serviceJobOffers($service_id)
    {
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
    {
        $user = UserController::getUser(Auth::user()->id);
        $jobs = JobController::myJob($service_id);
        //$service = ServiceController::get($user->service->id);

        return view('dashboard.completed-jobs')->with(['user' => $user, 'jobs' => $jobs]);
    }


    public function jobsOngoing()
    {
        
        $jobs_ongoing = $jobs = JobController::jobOffer();


        return view('jobs.jobs-ongoing')->with(['jobs_ongoing' => $jobs_ongoing]);


    }


    public function jobsCompleted()
    {
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

    {   $this->validate($request,
        [  'job_name'=>'required',
           'offer_amount' => 'required',
           'duration'=>'required',
           'description' => 'required',
           ]);
   
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
   $done = JobController::jobDone($job_id);
   if($done){
    flash('Ok, congrats your client would be notified or you can also notify him')->success();
   }else{
    flash('Something went wrong operation failed, please try again')->success();
   }
 }
  /**
    * accepts an offer
    *
    * @var job_id
    * @return response
    */
  public function acceptOffer($id){
    $offer = JobController::acceptOffer($id);
    if($offer){
        flash('Offer accepted successfully, await a response from Bido team when he pays to start the Job')->success();
    }else{
        flash('Something went wrong operation failed to complete')->error();
    }
  }

   /**
    * declines an offer
    *
    * @var request
    * @return response
    */
  public function declineOffer(Request $request){
    $offer = JobController::declineOffer($request);
    if($offer){
        flash('Offer declined successfully')->success();
    }else{
        flash('Something went wrong operation failed to complete')->error();
    }
  }


}
