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

Route::get('/','PagesController@home');
Route::get('dashboard', 'Dash\DashboardController@home');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration admin
Route::get('auth/register', ['as' => 'auth.adsignup','uses' => 'UsersController@getAdminRegister']);
Route::post('auth/register', ['as' => 'auth.adregister', 'uses' => 'UsersController@postAdminRegister']);

//Registration dokter
Route::get('auth/drregister', ['as' => 'auth.drsignup','uses' => 'UsersController@getDokterRegister']);
Route::post('auth/drregister', ['as' => 'auth.drregister', 'uses' => 'UsersController@postDokterRegister']);

//Rekam Medik
Route::get('auth/rekammedik', ['as' => 'auth.rm','middleware' => 'role:admin|superuser','uses' => 'RekamMedikController@home']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
