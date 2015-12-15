<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//Dashboard routes
Route::get('dashboard', ['as' => 'auth.dashboard.home', 'uses' =>'DashboardController@home']);
Route::get('dashboard/tambah-ke-poli', ['as' => 'auth.dashboard.tambah-ke-poli', 'middleware' => 'role:admin|super.user', 'uses' => 'DashboardController@home']);
Route::post('dashboard/cetakpoli', ['as' => 'cetak', 'middleware' => 'role:admin|super.user', 'uses' => 'DashboardController@cetak']);
Route::get('dashboard/validasi/{id}-{id_dokter}-{kode_visit}', ['as' => 'auth.dashboard.validasi', 'middleware' => 'role:dokter', 'uses' => 'DashboardController@showTemp']);
Route::post('dashboard/validasi/{id}-{id_dokter}-{kode_visit}', ['as' => 'auth.dashboard.validasi', 'middleware' => 'role:dokter', 'uses' => 'DashboardController@validateTemp']);
Route::get('403',  ['as' => 'auth.dashboard.roleerror', 'uses' => 'DashboardController@error']);

// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration admin
Route::get('admin', ['as' => 'auth.lihat-admin', 'middleware' => 'role:super.user|dokter|admin', 'uses' => 'UsersController@indexAdmin']);
Route::get('admin/tambah', ['as' => 'auth.adsignup', 'middleware' => 'role:super.user','uses' => 'UsersController@getAdminRegister']);
Route::post('admin/tambah', ['as' => 'auth.adregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postAdminRegister']);
Route::get('admin/{id?}', ['as' => 'auth.edit-admin', 'middleware' => 'role:super.user', 'uses' => 'UsersController@editAdmin']);
Route::post('admin/{id?}', ['as' => 'auth.edit-admin', 'middleware' => 'role:super.user', 'uses' => 'UsersController@updateAdmin']);

//Registration dokter
Route::get('dokter', ['as'=> 'auth.lihat-dokter', 'middleware' => 'role:super.user|admin|dokter', 'uses' => 'UsersController@indexDokter']);
Route::get('dokter/tambah', ['as' => 'auth.drregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@getDokterRegister']);
Route::post('dokter/tambah', ['as' => 'auth.drregister', 'middleware' => 'role:super.user', 'uses' => 'UsersController@postDokterRegister']);
Route::get('dokter/{id?}', ['as' => 'auth.edit-dokter', 'middleware' => 'role:super.user', 'uses' => 'UsersController@editDokter']);
Route::post('dokter/{id?}', ['as' => 'auth.edit-dokter', 'middleware' => 'role:super.user', 'uses' => 'UsersController@updateDokter']);

//Pasien routes
Route::get('pasien', ['as' => 'pasien.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'PasienController@index']); //view all patients
Route::get('pasien/tambah', ['as' => 'pasien.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@create']); //display the form
Route::post('pasien/tambah', ['as' => 'pasien.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@store']); //handle the form input
Route::get('pasien/{id?}', ['as' => 'pasien.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@edit']); //show each patient page individually
Route::post('pasien/{id?}', ['as' => 'pasien.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PasienController@update']); //update the pasien data from form

//Poli routes
Route::get('poli', ['as' => 'poli.index', 'middleware' => 'role:admin|dokter|super.user', 'uses' => 'PoliController@index']); //view all poli records
Route::get('poli/tambah', ['as' => 'poli.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@create']);
Route::post('poli/tambah', ['as' => 'poli.tambah', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@store']);
Route::get('poli/{id?}', ['as' => 'poli.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@edit']);
Route::post('poli/{id?}', ['as' => 'poli.edit', 'middleware' => 'role:admin|super.user', 'uses' => 'PoliController@update']);

//Rekam Medik
Route::get('rekam-medik', ['as' => 'rekam-medik.index','middleware' => 'role:admin|super.user|dokter','uses' => 'RekamMedikController@index']);
Route::get('rekam-medik/tambah', ['as' => 'rekam-medik.tambah-rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@create']);
Route::post('rekam-medik/tambah', ['as' => 'rekam-medik.tambah-rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@store']);
Route::get('rekam-medik/{id?}-{id_dokter?}-{kode_visit?}', ['as' => 'rekam-medik.edit-rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@edit']);
Route::post('rekam-medik/{id?}-{id_dokter?}-{kode_visit?}', ['as' => 'rekam-medik.edit-rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@update']);
Route::get('rekam-medik/cetak', ['as' => 'rekam-medik.cetak-rm','middleware' => 'role:admin|super.user','uses' => 'RekamMedikController@cetak']);

// Route::post('rekam-medik/{id?}/{kode_visit?}', ['as' => 'rekam-medik.edit-rm','middleware' => 'role:admin','uses' => 'RekamMedikController@updateOnConfirmation']);
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
