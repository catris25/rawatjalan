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
//Route::get('admin', ['as' => 'admin.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'UsersController@indexAdmin']);
Route::get('admin/tambah', ['as' => 'auth.adsignup', 'middleware' => 'role:super.user','uses' => 'UsersController@getAdminRegister']);
Route::post('auth/register', ['as' => 'auth.adregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postAdminRegister']);

//Registration dokter
Route::get('dokter/tambah', ['as' => 'auth.drsignup', 'middleware' => 'role:super.user', 'uses' => 'UsersController@getDokterRegister']);
Route::post('auth/drregister', ['as' => 'auth.drregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postDokterRegister']);

//Rekam Medik
// Route::get('auth/rekammedik', ['as' => 'auth.rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@home']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Pasien routes
Route::get('pasien', ['as' => 'pasien.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'PasienController@index']); //view all patients
Route::get('pasien/tambah', ['as' => 'pasien.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@create']); //display the form
Route::post('pasien/tambah', ['as' => 'pasien.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@store']); //handle the form input
Route::get('pasien/{id?}', ['as' => 'pasien.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@edit']); //show each patient page individually
Route::post('pasien/{id?}', ['as' => 'pasien.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@update']); //update the pasien data from form
// Route::get('pasien', ['as' => 'pasien.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'PasienController@search']); //search the pasien

//Poli routes
Route::get('poli', ['as' => 'poli.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'PoliController@index']); //view all poli records
Route::get('poli/tambah', ['as' => 'poli.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@create']);
Route::post('poli/tambah', ['as' => 'poli.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@store']);
Route::get('poli/{id?}', ['as' => 'poli.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@edit']);
Route::post('poli/{id?}', ['as' => 'poli.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@update']);
