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
Route::get('/block-post/{id}', 'webViewController@blockPost');
Route::any('/ajax-post-comment', 'webViewController@ajaxPostComment');
Route::any('/logout', 'webViewController@logout');
Route::get('/load-comment', 'webViewController@loadComment');
Route::post('/register-user', 'webViewController@registerUser');
Route::post('/register-user-any', 'webViewController@registerUserModal');
Route::get('/login', 'webViewController@signin');
Route::get('/register', 'webViewController@register');
Route::get('/forgot-password', 'webViewController@forgotpassword');
Route::get('/suspended-banned', 'webViewController@suspendedBanned');
Route::post('post-login', 'webViewController@postLogin');
Route::post('post-login-any', 'webViewController@postLoginModal');
Route::get('/{admin}/{name}', 'webViewController@userDashboard');
Route::get('/user/{name}', 'webViewController@userDashboard');
Route::get('/{name}/my-post/{id}', 'webViewController@myPost');
Route::get('/post-full-view/{id}', 'webViewController@fullView');
Route::post('/add-post', 'webViewController@addPost');
Route::any('/ajax-post-like', 'webViewController@ajaxAddPostLike');
Route::get('/post-like/{user_id}/{post_id}', 'webViewController@addPostLike');
Route::post('/add-user-image', 'webViewController@addUserImage');
Route::post('/post-comment', 'webViewController@postComment');
Route::get('/page/{category}', 'webViewController@getByCategory');
Route::get('/blocked-posts', 'webViewController@blockedPost');
Route::get('/unblock-post/{id}', 'webViewController@unBlockPost');
Route::get('/view-users', 'webViewController@getUsers');
Route::get('/view-blocked-users', 'webViewController@getBlockedUsers');
Route::post('/update-profile', 'webViewController@updateUser');
Route::get('/delete-post/{id}', 'webViewController@deletePost');
Route::get('/delete-comment/{id}', 'webViewController@deleteComment');



Route::get('dashboard', function () {
    return view('dashboard.index');
});


