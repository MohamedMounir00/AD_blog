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
Route::group(['namespace' => 'User'],function(){

Route::get('/','HomeController@index');
	Route::get('post/{post}','PostController@post')->name('post');
Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
Route::get('post/cat/{cat}','HomeController@cat')->name('cat');
});

Route::group(['namespace' => 'Admin'],function(){

Route::get('admin/home','HomeController@index')->name('admin.home');
Route::resource('admin/post','PostController');
Route::resource('admin/tag','TagController');
Route::resource('admin/cat','CatController');
Route::resource('admin/user','UserController');

});
