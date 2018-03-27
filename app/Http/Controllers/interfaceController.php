<?php

namespace App\Http\Controllers;

use App\view;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\searchController;
use Validator;
use Auth;
use App\Vendor;
use App\Service;

class interfaceController extends Controller
{
    /**
     * This method checks
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
      protected function postLogin(Request $request)
    {   $validator = Validator::make($request->all(), [
        'phone_no' => 'required|min:11',
        'password' => 'required|max:255'
        ]);
        if($validator->passes())
        {
        $auth = AuthController::authenticate($request);
        if($auth === 'admin'){
            $vendor =  Auth::user();
          return redirect('admin/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth === 'user') {
            $user = Auth::user();
            flash('Login Successful')->success();
            return redirect('user/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
        	Auth::logout();
        	flash("Phone number or Password Incorrect")->error();
            return redirect()->back();
        }
    }
    else
    {
        return redirect()->back()->withErrors($validator);
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
    	return view('pages.about')->with(['title' => 'About Biddo']);
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
 { $user = Auth::user();
    return view('dashboard.index', compact(['user']));

 }
/**
 * This method returns the admin page
 *
 * returns collecion
 */
 public function adminDashboard()
 { $admin = AdminController::get(Auth::user()->id);
    return view('admin.dashboard')->with(['admin'=>$admin]);
    
 }
    /**
     * This method returns the admin user detail page
     *
     * returns collection
     */
    public function adminUserDetails()
    { $admin = AdminController::get(Auth::user()->id);
        return view('admin.user-details')->with(['admin'=>$admin]);

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
     $validator = validator::make($request->all(),
        [  'email'=>'unique::users',
           'name'=>'required',
           'state'=>'required',
           'phone_no'=>'required',
           ]);
          if($validator)
        {
            $user = UserController::create($request);
            if($user)
            {
                flash()->overlay("Account created successfully", "Biddo");
                return redirect('/signin');

            }else{
                return redirect()->back()->with('status', 'Something went wrong user could not be created');
            }
        }
        else
        {
            return redirect()->back()->withErrors($validator);
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
 public static function createService(Request $request)
 {   $validator = validator::make($request->all(),
        [  'service_name'=>'required',
           'professional_title' => 'required',
           'location'=>'required',
           ]);
 if($validator->passes()) {
     $service = ServiceController::create($request);

     if ($service) {
         return redirect()->back()->with('status', 'Service created successfully');
     } else {
         return redirect()->back()->with('status', 'Something went wrong, Service could not be created');
     }
 }
      
 }
 /**
 * This method creates a search
 * 
 *
 */
 public function postSearch(Request $request)
 {
    $validator = validator::make($request->all(),
        [  'professional_title'=>'required',
           ]);
    if($validator->fails()) {
        return redirect()->back()->with('status', 'Please enter service name you want to find');
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
 * 
 *
 */
  public function fullview($id)
  {
    $fullview = searchController::fullview($id);
    if(!empty($fullview))
    {
        return view('pages.full-view')->with(['fullview' => $fullview]);
    }
  }

}
