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

//Route::get('/','PagesController@home');
Route::get('dashboard', 'Dash\DashboardController@home');
Route::get('roleerror', 'Dash\DashboardController@error');

// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration admin
Route::get('auth/register', ['as' => 'auth.adsignup', 'middleware' => 'role:super.user','uses' => 'UsersController@getAdminRegister']);
Route::post('auth/register', ['as' => 'auth.adregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postAdminRegister']);

//Registration dokter
Route::get('auth/drregister', ['as' => 'auth.drsignup', 'middleware' => 'role:super.user', 'uses' => 'UsersController@getDokterRegister']);
Route::post('auth/drregister', ['as' => 'auth.drregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postDokterRegister']);

//Rekam Medik
Route::get('auth/rekammedik', ['as' => 'auth.rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@home']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Pasien routes

Route::get('pasien', 'PasienController@index'); //view all patients
Route::get('pasien/tambah', 'PasienController@create'); //display the form
Route::post('pasien/tambah', 'PasienController@store'); //handle the form input
Route::get('pasien/{id?}', 'PasienController@edit'); //show each patient page individually
Route::post('pasien/{id?}', 'PasienController@update'); //update the pasien data from form
