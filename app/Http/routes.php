<?php

/*
 * |-------------------------------------------------------------------------- | Application Routes |-------------------------------------------------------------------------- | | Here is where you can register all of the routes for an application. | It's a breeze. Simply tell Laravel the URIs it should respond to | and give it the controller to call when that URI is requested. |
 */
Route::controllers ( [ 
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController' 
] );

Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...


// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email',  'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::get ( '/', 'PagesController@home' );

Route::get('/example', function (){
	return view('example');
});

Route::get ( '/{type}', 'PagesController@getPage' );

Route::get ( '/{type1}/{type2}', 'PagesController@getPage2' );

Route::post ( '/{type1}', 'FormController@post' );

Route::post ( '/{type1}/{type2}', 'FormController@post2' );


