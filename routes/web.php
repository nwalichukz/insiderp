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

Route::get('/', 'WebViewController@index');
Route::get('/post/{user_name}', 'WebViewController@userPost');
Route::get('/delete-comment/{id}', 'WebViewController@deleteComment');
Route::get('/comment-like/{id}', 'WebViewController@likeComment');
Route::post('/post-search', 'WebViewController@search');
Route::get('/block-post/{id}', 'WebViewController@blockPost');
Route::any('/ajax-post-comment', 'WebViewController@ajaxPostComment');
Route::get('/{name}/my-post/{id}', 'WebViewController@myPost');
Route::any('/logout', 'WebViewController@logout');
Route::get('/add-option/{id}', 'WebViewController@addOption');
Route::get('/edit-user/{id}', 'WebViewController@getUser');
Route::post('/register-user', 'WebViewController@registerUser');
Route::get('/delete-post/{id}', 'WebViewController@deletePost');
Route::get('/load-comment', 'WebViewController@loadComment');
Route::get('/post-full-view/{id}/{title}', 'WebViewController@fullView');
Route::post('/register-user-any', 'WebViewController@registerUserModal');
Route::get('/login', 'WebViewController@signin');
Route::get('/edit-post/{post_id}', 'WebViewController@getEditPost');
Route::post('/update-post', 'WebViewController@updatePost');
Route::get('/page/{category}', 'WebViewController@getByCategory');
Route::get('/register', 'WebViewController@register');
Route::get('/forgot-password', 'WebViewController@forgotpassword');
Route::get('/suspended-banned', 'WebViewController@suspendedBanned');
Route::post('post-login', 'WebViewController@postLogin');
Route::post('post-login-any', 'WebViewController@postLoginModal');
Route::get('/{admin}/{name}', 'WebViewController@userDashboard');
Route::get('/user/{name}', 'WebViewController@userDashboard');
Route::any('/check-availability', 'WebViewController@checkAvailability');
Route::post('/add-post', 'WebViewController@addPost');
Route::any('/ajax-post-like', 'WebViewController@ajaxAddPostLike');
Route::get('/post-like/{user_id}/{post_id}', 'WebViewController@addPostLike');
Route::post('/add-user-image', 'WebViewController@addUserImage');
Route::post('/post-comment', 'WebViewController@postComment');
Route::get('/blocked-posts', 'WebViewController@blockedPost');
Route::get('/unblock-post/{id}', 'WebViewController@unBlockPost');
Route::get('/view-users', 'WebViewController@getUsers');
Route::get('/view-blocked-users', 'WebViewController@getBlockedUsers');
Route::post('/update-profile', 'WebViewController@updateUser');
Route::get('/success-email-sent', 'WebViewController@SuccessEmail');
Route::post('/change-password', 'WebViewController@changePassword');
Route::post('/invite-friends', 'WebViewController@inviteFriends');
Route::post('/reset-password', 'WebViewController@postResetPassword');
Route::get('/contact', 'WebViewController@contact');
Route::get('/about', 'WebViewController@about');
Route::get('/terms', 'WebViewController@terms');
Route::any('/autosuggest', 'WebViewController@autosuggest');
Route::get('/view-votes', 'WebViewController@getVote');
Route::any('/count-view', 'WebViewController@countView');
Route::post('/post-option', 'WebViewController@postOption');
Route::get('/trending-posts', 'WebViewController@latest');
Route::post('/send-enquiry', 'WebViewController@sendContact');
Route::get('/contact-sent', 'WebViewController@contactSent');
Route::get('/account-success', 'WebViewController@accountSuccess');
//Route::get('/add-seed', 'WebViewController@addSeed');








