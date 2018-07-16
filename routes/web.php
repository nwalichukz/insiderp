<?php
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'webViewController@index');
Route::get('/delete-comment/{id}', 'webViewController@deleteComment');
Route::post('/post-search', 'webViewController@search');
Route::get('/block-post/{id}', 'webViewController@blockPost');
Route::any('/ajax-post-comment', 'webViewController@ajaxPostComment');
Route::get('/{name}/my-post/{id}', 'webViewController@myPost');
Route::any('/logout', 'webViewController@logout');
Route::post('/register-user', 'webViewController@registerUser');
Route::get('/delete-post/{id}', 'webViewController@deletePost');
Route::get('/load-comment', 'webViewController@loadComment');
Route::get('/post-full-view/{id}', 'webViewController@fullView');
Route::post('/register-user-any', 'webViewController@registerUserModal');
Route::get('/login', 'webViewController@signin');
Route::get('/page/{category}', 'webViewController@getByCategory');
Route::get('/register', 'webViewController@register');
Route::get('/forgot-password', 'webViewController@forgotpassword');
Route::get('/suspended-banned', 'webViewController@suspendedBanned');
Route::post('post-login', 'webViewController@postLogin');
Route::post('post-login-any', 'webViewController@postLoginModal');
Route::get('/{admin}/{name}', 'webViewController@userDashboard');
Route::get('/user/{name}', 'webViewController@userDashboard');

Route::post('/add-post', 'webViewController@addPost');
Route::any('/ajax-post-like', 'webViewController@ajaxAddPostLike');
Route::get('/post-like/{user_id}/{post_id}', 'webViewController@addPostLike');
Route::post('/add-user-image', 'webViewController@addUserImage');
Route::post('/post-comment', 'webViewController@postComment');
Route::get('/blocked-posts', 'webViewController@blockedPost');
Route::get('/unblock-post/{id}', 'webViewController@unBlockPost');
Route::get('/view-users', 'webViewController@getUsers');
Route::get('/view-blocked-users', 'webViewController@getBlockedUsers');
Route::post('/update-profile', 'webViewController@updateUser');
Route::get('/success-email-sent', 'webViewController@SuccessEmail');
Route::post('/change-password', 'webViewController@changePassword');
Route::post('/invite-friends', 'webViewController@inviteFriends');
Route::post('/reset-password', 'webViewController@postResetPassword');
Route::get('/contact', 'webViewController@contact');
Route::get('/about', 'webViewController@about');
Route::get('/terms', 'webViewController@terms');
Route::any('/autosuggest', 'webViewController@autosuggest');





Route::get('dashboard', function () {
    return view('dashboard.index');
});


