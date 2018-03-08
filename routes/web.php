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

use Illuminate\Support\Facades\Route;

Route::get('/', 'interfaceController@index');
Route::get('/about', 'interfaceController@about')->name('about');
Route::get('/terms', 'interfaceController@terms')->name('terms');
Route::get('/contact', 'interfaceController@contact')->name('contact');
Route::get('/login', 'interfaceController@login')->name('login');
Route::get('/register', 'interfaceController@register')->name('register');
Route::post('/register-vendor', 'interfaceController@registerVendor')->name('register-vendor');
Route::get('/suspended-banned', 'interfaceController@suspendedBanned');
Route::get('/user/{user}', 'interfaceController@userDashboard');
Route::get('/admin/{user}', 'interfaceController@adminDashboard');
Route::post('/login', 'interfaceController@postLogin')->name('login');
Route::get('/dashboard', 'interfaceController@dashboard')->name('dashboard');
Route::get('/job-detail', 'interfaceController@jobDetail')->name('job');
Route::get('/offers', 'interfaceController@offers')->name('offer');
Route::get('/manage-applications', 'interfaceController@manageApplications')->name('manage-applications');
Route::get('/search', 'interfaceController@search')->name('search');
