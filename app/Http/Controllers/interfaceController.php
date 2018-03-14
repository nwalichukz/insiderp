<?php

namespace App\Http\Controllers;

use App\view;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ServiceController;
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
        'email' => 'required|max:255',
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
            return redirect('user/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth === 'suspended') {
            return redirect('suspended-banned');
        }elseif ($auth === 'banned') {
            return redirect('suspended-banned');
        }else{
        	Auth::logout();
            return redirect()->back()->with('status','Invalid login details');
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
        return view('auth.login');
    }

    /**
     * @method register
     * returns register page
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * @method dashboard
     * returns user dashboard page
     */
    public function dashboard()
    {
        return view('dashboard.index');
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

    public function search()
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
 { $user = UserController::get(Auth::user()->id);
    return view('dashboard.index')->with(['user'=>$user]);

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
     * This method returns the admin page
     *
     * returns collecion
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
 public function registerVendor(Request $request)
 {   
     $validator = validator::make($request->all(),
        [  'email'=>'required|unique::users',
           'name'=>'required',
           'location'=>'required',
           'state'=>'required',
           'phone_no'=>'required',
           'tradename' => 'required',
           ]);
          if($validator)
        {
            $service = new Vendor;
            $service->tradename = $request['tradename'];
            $service->save();
            $user = UserController::create($request, $service->id);
            if($user)
            {
                return redirect()->back()->with('status', 'Account created successfully, thanks for joining us');
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
/**
 * This method creates a service
 * 
 *
 */
 public static function createService(Request $request)
 {   $validator = validator::make($request->all(),
        [  'name'=>'required',
           'location'=>'required',
           'user_id' => 'required',
           'vendor_id' => 'required',
           ]);
 if($Validator->passes()){
     $service = ServiceController::create($request);
   }
   if($service)
   {
    return redirect()->back()->with('status', 'Service created successfully');
   }else{
    return redirect()->back()->with('status', 'Something went wrong, Service could not be created');
   }
      
 }

}
