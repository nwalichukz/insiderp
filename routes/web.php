<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'interfaceController@index');
Route::post('/send-enquiry', 'interfaceController@sendEquiry');
Route::get('/about', 'interfaceController@about')->name('about');
Route::get('/terms', 'interfaceController@terms')->name('terms');
Route::get('/contact', 'interfaceController@contact')->name('contact');
Route::get('/faqs', 'interfaceController@faqs')->name('faqs');
Route::get('/signin', 'interfaceController@login')->name('signin');
Route::get('/register', 'interfaceController@register')->name('register');
Route::post('/register-vendor', 'interfaceController@registerVendor')->name('signup');
Route::post('/register-vendor-modal', 'interfaceController@registerVendorModal');
Route::post('/post-login-modal', 'interfaceController@postLoginModal');
Route::get('/suspended-banned', 'interfaceController@suspendedBanned');
Route::get('/user/{user}', 'interfaceController@userDashboard');
Route::get('/admin/vendors', 'interfaceController@adminVendors')->name('vendors');
Route::get('/admin/job-offers', 'interfaceController@adminJobOffers');
Route::get('/admin/jobs-ongoing', 'interfaceController@adminJobsOngoing');
Route::get('/admin/jobs-completed', 'interfaceController@adminJobsCompleted');
Route::get('/admin/{user}/details', 'interfaceController@adminUserDetails')->name('userDetails');
Route::get('/admin/suspended-users', 'interfaceController@suspendedUsers')->name('suspended');
Route::get('/admin/administrators', 'interfaceController@adminUsers')->name('administrators');
Route::get('/admin/{admin}', 'interfaceController@adminDashboard')->name('admin');
Route::post('/login', 'interfaceController@postLogin')->name('login');
Route::get('/job-detail', 'interfaceController@jobDetail')->name('job');
Route::get('/my-jobs', 'interfaceController@myJobOffer');
Route::get('/jobs-ongoing', 'interfaceController@jobsOngoing');
Route::get('/jobs-completed', 'interfaceController@jobsCompleted');
Route::get('/offers', 'interfaceController@offers')->name('offer');
Route::get('/manage-applications', 'interfaceController@applications')->name('manage-applications');
Route::get('my-applications', 'interfaceController@myApplications')->name('my-applications');
Route::get('/service', 'interfaceController@service')->name('service');
Route::post('/service/add', 'interfaceController@createService')->name('addService');
Route::post('/search', 'interfaceController@postSearch')->name('search');
Route::get('/view-search/{id}', 'interfaceController@fullView');
Route::get('profile/edit/', 'interfaceController@editProfile')->name('editProfile');
Route::post('profile/update', 'interfaceController@updateProfile')->name('updateProfile');
Route::post('/change-avatar', 'interfaceController@addAvatar')->name('updateAvatar');
Route::post('/previous-works', 'interfaceController@addPrevWorkImg')->name('workImages');
Route::post('/change-logo', 'interfaceController@addLogo')->name('updateLogo');
Route::get('/logout', 'interfaceController@logout');
Route::get('search-category/{category}', 'interfaceController@searchCategory')->name('search-category');
Route::post('/service-update', 'interfaceController@updateService')->name('updateService');
Route::get('/service/delete/{id}', 'interfaceController@deleteService')->name('deleteService');
Route::get('/service/edit/{id}', 'interfaceController@editService')->name('editService');
Route::get('/view-service/{id}', 'interfaceController@viewService')->name('viewService');
Route::post('send-message', 'interfaceController@sendMessage');
Route::get('/message/delete/{id}', 'interfaceController@deleteMessage');
Route::post('/make-offer', 'interfaceController@makeOffer');
Route::get('post-job', 'interfaceController@postJob');
Route::post('/add-job', 'interfaceController@postJobSave');
Route::get('/job-offers/{service_id}', 'interfaceController@serviceJobOffers');
Route::get('/ongoing-jobs/{service_id}', 'interfaceController@serviceOngoingJobs');
Route::get('/completed-jobs/{service_id}', 'interfaceController@serviceCompletedJobs');
Route::get('/notifications', 'interfaceController@notifications');
Route::get('/accept-offer/{id}', 'interfaceController@acceptOffer');
Route::get('/job-done', 'interfaceController@jobDone');
Route::post('/decline-offer', 'interfaceController@declineOffer');
Route::get('/post-job', 'interfaceController@postJob')->name('postJob');
Route::get('/posted-jobs', 'interfaceController@myPostedJobs');
Route::post('/post-job', 'interfaceController@postJobSave')->name('postJobSave');
Route::get('browse_jobs', 'interfaceController@browse_jobs');
Route::get('/bid/{post_job_id}', 'interfaceController@makeBid')->name('bid');
Route::post('/post-enquiry', 'interfaceController@contactUs');
Route::get('/get-all-enquiry', 'interfaceController@getAllEnquiry');
Route::get('/get-enquiry/{id}', 'interfaceController@getEnquiry');
Route::get('/delete-enquiry/{id}', 'interfaceController@deleteEnquiry');
Route::get('/edit-posted-job/{id}', 'interfaceController@editPostedJob');
Route::get('/delete-posted-job/{id}', 'interfaceController@deletePostedJob');
Route::post('/update-posted-job', 'interfaceController@updatePostedJob')->name('postJobUpdate');
Route::get('/view-applications/{id}', 'interfaceController@viewApplications');
Route::get('/accept-job-application/{job_id}/{bid_id}', 'interfaceController@acceptApplication');
Route::get('/cancel-offered-job-application/{job_id}/{bid_id}', 'interfaceController@cancelApplication');


