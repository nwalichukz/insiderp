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
Route::get('/about', 'interfaceController@about')->name('about');
Route::get('/terms', 'interfaceController@terms')->name('terms');
Route::get('/contact', 'interfaceController@contact')->name('contact');
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
Route::get('/admin/{user}', 'interfaceController@adminDashboard')->name('admin');
Route::post('/login', 'interfaceController@postLogin')->name('login');
Route::get('/job-detail', 'interfaceController@jobDetail')->name('job');
Route::get('/my-jobs', 'interfaceController@myJobs');
Route::get('/jobs-ongoing', 'interfaceController@jobsOngoing');
Route::get('/jobs-completed', 'interfaceController@jobsCompleted');
Route::get('/offers', 'interfaceController@offers')->name('offer');
Route::get('/manage-applications', 'interfaceController@manageApplications')->name('manage-applications');
Route::get('/service', 'interfaceController@service')->name('service');
Route::post('/service/add', 'interfaceController@createService')->name('addService');
Route::post('/search', 'interfaceController@postSearch')->name('search');
Route::get('/view/{id}', 'interfaceController@fullView')->name('fullView');
Route::get('profile/edit/', 'interfaceController@editProfile')->name('editProfile');
Route::post('profile/update', 'interfaceController@updateProfile')->name('updateProfile');
Route::post('/change-avatar', 'interfaceController@addAvatar')->name('updateAvatar');
Route::post('/change-logo', 'interfaceController@addLogo')->name('updateLogo');
Route::get('/logout', 'interfaceController@logout');
Route::get('search-category/{category}', 'interfaceController@searchCategory')->name('search-category');
Route::post('/service-update', 'interfaceController@updateService')->name('updateService');
Route::get('/service/delete/{id}', 'interfaceController@deleteService');
Route::get('/service/edit/{id}', 'interfaceController@editService');
Route::get('/view-service/{id}', 'interfaceController@viewService')->name('viewService');
Route::post('send-message', 'interfaceController@sendMessage');
Route::get('/message/delete/{id}', 'interfaceController@deleteMessage');
Route::post('/make-offer', 'interfaceController@makeOffer');
Route::get('post-job', 'interfaceController@postJob');
Route::post('/add-job', 'interfaceController@postJobSave');
Route::get('/job-offers/{service_id}', 'interfaceController@jobOffers');
Route::get('/ongoing-jobs/{service_id}', 'interfaceController@ongoingJobs');
Route::get('/completed-jobs/{service_id}', 'interfaceController@completedJobs');
