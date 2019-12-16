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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('posts/create', 'PostController@create')->name('posts.create');

Route::post('posts/store', 'PostController@store')->name('post.store');
 
Route::post('posts/comment', 'CommentController@store')->name('comment.store');

Route::get('posts/all', 'PostController@index')->name('posts.index');

Route::get('posts/{post}', 'PostController@show')->name('posts.show');

Route::delete('posts/{id}', 'PostController@destroy')->name('post.destroy');

