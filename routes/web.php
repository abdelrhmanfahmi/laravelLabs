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
	return view('welcome');
});

Route::get('/Logout' , function(){
  auth()->logout();
  return redirect('/login');
});


Route::group(['middleware' => 'auth'] , function(){
	Route::get('/posts' , 'PostRequest@index')->name('posts.index');
	Route::get('/posts/create' , 'PostRequest@create')->name('posts.create');
	Route::post('/posts' , 'PostRequest@store')->name('posts.store');
	Route::get('/posts/{post}' , 'PostRequest@show')->name('posts.show');
	Route::get('/posts/{post}/edit' , 'PostRequest@edit')->name('posts.edit');
	Route::PUT('/posts/{post}' , 'PostRequest@update')->name('posts.update');
	Route::DELETE('/posts/{post}' , 'PostRequest@destroy')->name('posts.destroy');
	Route::get('/comments/{comment}' , 'PostRequest@ShowComment')->name('comment.ShowComment');
	Route::post('/comments/{id}' , 'PostRequest@StoreComment')->name('comment.StoreComment');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToProvider2');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback2');
