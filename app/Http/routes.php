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

//Route::get('/', 'DashController@brb');


Route::get('/', 'DashController@dashboard');
Route::get('/dashboard', 'DashController@dashboard');

Route::group(['middlewareGroups' => ['web']], function () {
  Route::get('/home', 'WisatawansController@afterdaftar');
  Route::get('/profile', 'WisatawansController@index');
});

//Route::post('/result', 'ResultController@main');
// ROUTE ADMIN
// =============================================================================
// =============================================================================

Route::auth();
Route::get('/masuk', 'A_LoginController@index');

Route::group(['middlewareGroups' => ['web', 'role:admin']], function () {

    Route::get('/admin', 'ADashController@index');
    Route::get('/admin/dashboard', 'ADashController@index');

    Route::get('/admin/settings', 'A_SettingController@index');
    Route::post('/admin/settings', 'A_SettingController@store');

    Route::resource('admin/wisatawan', 'A_WisatawanController');
    Route::get('admin/wisatawans/lokal', 'A_WisatawanController@lokal');

    Route::resource('admin/objek', 'A_ObjekController');
    Route::resource('admin/users', 'A_UsersController');

//  Route::resource('admin/berita', 'A_BeritaController');
//  Route::resource('admin/slider', 'A_SliderController');
//  Route::resource('admin/tentang', 'A_TentangController');
//  Route::resource('admin/setting', 'A_SettingController');
//  Route::resource('admin/testi', 'A_TestimoniController');
//  Route::resource('admin/inputwisatawan', 'A_InputWisatawanController');
});

// ROUTE UNTUK EXCEL
Route::get('admin/wisatawans/export', [
    'as' => 'wisatawan.export',
    'uses' => 'A_WisatawanController@export'
]);

Route::post('admin/wisatawans/export', [
    'as' => 'wisatawan.export.post',
    'uses' => 'A_WisatawanController@exportPost'
]);

Route::post('admin/wisatawans/exportlokal', [
    'as' => 'wisatawan.export.postlokal',
    'uses' => 'A_WisatawanController@exportLokal'
]);

Route::get('/admin/tes', 'Tes@index');

// Route::get('admin/add', function()
// {
//   return View::make('admin.add');
// });
// Route::get('admin/adds', function()
// {
//   return View::make('admin.adds');
// });
// Route::get('admin/tes2', 'Tes@tes2');
// ROUTE PETUGAS
// =============================================================================
// =============================================================================

Route::group(['middlewareGroups' => ['web', 'role:petugas']], function () {

    Route::get('petugas', 'P_PetugasController@index');

    Route::get('petugas/lokal/create', 'P_LokalController@create');
    Route::post('petugas/lokal', 'P_LokalController@store');

    Route::get('petugas/mancanegara/create', 'P_MancaController@create');
    Route::post('petugas/mancanegara', 'P_MancaController@store');

    Route::resource('petugas/objek', 'P_ObjekController');
    Route::resource('petugas/wisatawan', 'P_WisatawanController');

    Route::get('petugas/wisatawan/hasil', 'P_WisatawanController@hasil');
});



// ROUTE WISATAWAN
// =============================================================================
// =============================================================================

Route::get('/brb', 'DashController@brb');
Route::get('/tes', 'DashController@tes');

Route::group(['middlewareGroups' => ['web']], function () {
    Route::resource('wisatawan', 'WisatawansController');
    Route::resource('objek', 'ObjekController');

//  Route::resource('berita', 'BeritaController');
//  Route::resource('testi', 'TestimoniController');
//  Route::resource('result', 'ResultController@main');
});

Route::get('/wisatawans/result', 'WisatawansController@result');

Route::get('/wisatawans', 'WisatawansController@index');

Route::get('/wisatawans/nothing', 'WisatawansController@nothing');

// Route::get('/wisatawans/page1', 'WisatawanController@page1');
// Route::post('/wisatawans/page1', 'WisatawanController@nama');
// Route::get('/wisatawans/page2', 'WisatawanController@page2');
// Route::put('/wisatawans/page2/{ambilid}', 'WisatawanController@negara');
// Route::get('/wisatawans/page3', 'WisatawanController@page3');
// Route::get('/wisatawans/page4', 'WisatawanController@page4');
// Route::get('/wisatawans/page5', 'WisatawanController@page5');
// Route::get('/wisatawans/page6', 'WisatawanController@page6');


Route::get('/kategoriobjek/{kategori}', 'ObjekController@cariobjek');

Route::get('result', 'ResultController@main');

Route::get('test', 'Tes@test');
Route::post('wisatawan/hasil', 'WisatawansController@hasil');


// Route::put('ruet', 'WisatawanController@ruet');

Route::get('tess', function() {
    return view('tess');
});

Route::get('te', function() {
    // return view('tesss');
    return redirect('petugas/objek')->with('message', 'Data sudah ditambahkan!');
});


Route::get('hitung', 'HitunganController@hitung');

//Route Custom ERROR 
Route::get('error', function() {
    return view('errors.custom');
});