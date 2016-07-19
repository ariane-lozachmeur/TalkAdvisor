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

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
	]);

Route::get('/', 'PagesController@home');

Route::get('/{type}', 'PagesController@getPage');

Route::get('/{type}/{id}', 'PagesController@getPage2');


Route::post('/search', 'FormController@search');

Route::post('/{type}/{id}', 'FormController@postReview');

Route::auth();

