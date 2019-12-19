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
*/


use App\Twitter;

app()->singleton('App\Twitter', function ($app) {
    return new Twitter('secret key');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('exampleroute', 'PostController@exampleMethod');

Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');

Route::get('posts/edit/{id}', 'PostController@edit')->name('posts.edit')->middleware('auth');

Route::post('posts/store', 'PostController@store')->name('post.store')->middleware('auth');

Route::post('posts/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');

Route::get('posts/all', 'PostController@index')->name('posts.index');
 
Route::post('posts/comment/{id}', 'CommentController@store')->name('comment.store')->middleware('auth');

Route::get('posts/{id}', 'PostController@show')->name('posts.show');

Route::delete('posts/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');

Route::get('users/{user}', 'UserController@show')->name('users.show');

Route::get('friends', 'UserController@myFriends')->name('users.friends')->middleware('auth');

Route::post('friends/add/{id}', 'UserController@addFriend')->name('users.add-friend');

Route::delete('friends/remove/{id}', 'UserController@removeFriend')->name('users.remove-friend');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
