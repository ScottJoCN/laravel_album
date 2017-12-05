<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// home
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/home' ,function(){
	$articles = App\Article::all();
	return view('markhome',compact('articles'));
})->name('markhome');
// albums source
Route::resource('albums','AlbumsController');
// photos source
Route::resource('photos','PhotosController');

Route::resource('articles','ArticlesController');
Route::post('markdown','ArticlesController@markdown')->name('markdown');

// login
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');
// register

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

// reset password link route
Route::get('password/email' , 'Auth\PasswordController@getEmail');
Route::post('password/email' , 'Auth\PasswordController@postEmail');
// reset password route
Route::get('password/reset/{token}' , 'Auth\PasswordController@getReset');
Route::post('password/reset' , 'Auth\PasswordController@postReset');
