<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class interfaceController extends Controller
{	/**
	* This method checks
	*
	*
	*
	*/
      protected function postLogin(Request $request)
    {   Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|max:255'
        ])->validate();
    
        $auth = AuthController::authenticate($request);
        if($auth == 'admin'){
        	$vendor = UserController::get(Auth::user()->id);
            return redirect('admin/'.str_replace(' ', '-', strtolower($vendor->name)));
        }elseif ($auth == 'user') {
         $user = UserController::get(Auth::user()->id);
            return redirect('user/'.str_replace(' ', '-', strtolower($user->name)));
        }elseif ($auth == 'suspended') {
        	$msg = OffenderController::getMessage(Auth::user()->vendor_id);
            return view('pages.suspended-banned')->with(['message'=>$msg]);
        }elseif ($auth == 'banned') {
        	$msg = OffenderController::getMessage(Auth::user()->vendor_id);
            return view('pages.suspended-banned')->with(['message'=>$msg]);
        }else{
        	Auth::logout();
        return redirect('/')->with('status','invalid login details');
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
     * @method aboutLetnote
     * returns aboutLetnote page
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


}
