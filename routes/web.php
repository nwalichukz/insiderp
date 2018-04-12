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
Route::get('/suspended-banned', 'interfaceController@suspendedBanned');
Route::get('/user/{user}', 'interfaceController@userDashboard');
Route::get('/admin/{user}/details', 'interfaceController@adminUserDetails');
Route::get('/admin/suspended-users', 'interfaceController@suspendedUsers')->name('suspended');
Route::get('/admin/administrators', 'interfaceController@adminUsers')->name('administrators');
Route::get('/admin/{user}', 'interfaceController@adminDashboard');
Route::post('/login', 'interfaceController@postLogin')->name('login');
Route::get('/job-detail', 'interfaceController@jobDetail')->name('job');
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
<<<<<<< HEAD
Route::get('/view-service/{id}', 'interfaceController@viewService')->name('viewService');
=======
Route::post('send-message', 'interfaceController@sendMessage');
Route::get('/message/delete/{id}', 'interfaceController@deleteMessage');
>>>>>>> d664b0df95e16078950f9bc297247af723b514f2
