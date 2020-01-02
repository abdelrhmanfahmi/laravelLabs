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

Route::get('/posts' , 'myController@index')->name('posts.index');
Route::get('/posts/create' , 'myController@create')->name('posts.create');
Route::post('/posts' , 'myController@store')->name('posts.store');
Route::get('/posts/{post}' , 'myController@show')->name('posts.show');
Route::get('/posts/{post}/edit' , 'myController@edit')->name('posts.edit');
Route::PUT('/posts/{post}' , 'myController@update')->name('posts.update');
Route::DELETE('/posts/{post}' , 'myController@destroy')->name('posts.destroy');