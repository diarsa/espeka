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

Route::get('/', 'DashController@dashboard');
Route::get('/dashboard', 'DashController@dashboard');
Route::get('/home', 'DashController@dashboard');

//Route::post('/result', 'ResultController@main');

// ROUTE ADMIN
// =============================================================================
// =============================================================================

Route::group(['middleware' => 'web'], function () {
  Route::auth();
  Route::get('/masuk', 'A_LoginController@index');

//  Route::get('/home', 'HomeController@index');
  Route::get('/admin', 'ADashController@index');
  Route::get('/admin/dashboard', 'ADashController@index');

  Route::get('/admin/settings', 'A_SettingController@index');
  Route::post('/admin/settings', 'A_SettingController@store');

});



Route::group(['middlewareGroups' => ['web','role:admin']], function () {
  Route::resource('admin/berita', 'A_BeritaController');
  Route::resource('admin/wisatawan', 'A_WisatawanController');
  Route::resource('admin/objek', 'A_ObjekController');
  Route::resource('admin/slider', 'A_SliderController');
  Route::resource('admin/tentang', 'A_TentangController');
  Route::resource('admin/users', 'A_UsersController');
//  Route::resource('admin/setting', 'A_SettingController');
  Route::resource('admin/testi', 'A_TestimoniController');
//  Route::resource('admin/inputwisatawan', 'A_InputWisatawanController');

});

Route::get('/admin/tes', 'Tes@index');

Route::get('admin/add', function()
{
  return View::make('admin.add');
});

Route::get('admin/adds', function()
{
  return View::make('admin.adds');
});


// ROUTE UNTUK EXCEL

Route::get('admin/wisatawans/export', [
  'as'    => 'wisatawan.export',
  'uses'  => 'A_WisatawanController@export'
]);

Route::post('admin/wisatawans/export', [
  'as'    => 'wisatawan.export.post',
  'uses'  => 'A_WisatawanController@exportPost'
]);

Route::get('admin/tes2', 'Tes@tes2');












// ROUTE WISATAWAN
// =============================================================================
// =============================================================================

Route::get('/brb', 'DashController@brb');
Route::get('/tes', 'DashController@tes');

Route::group(['middlewareGroups' => ['web']], function () {
  Route::resource('wisatawan', 'WisatawanController');
  Route::resource('objek', 'ObjekController');
  Route::resource('berita', 'BeritaController');
  Route::resource('testi', 'TestimoniController');

  Route::resource('result', 'ResultController@main');
});

Route::get('/wisatawans/result', 'WisatawanController@result');

Route::get('/wisatawans', 'WisatawanController@index');

Route::get('/wisatawans/page1', 'WisatawanController@page1');
Route::post('/wisatawans/page1', 'WisatawanController@nama');

Route::get('/wisatawans/page2', 'WisatawanController@page2');
Route::put('/wisatawans/page2/{ambilid}', 'WisatawanController@negara');

Route::get('/wisatawans/page3', 'WisatawanController@page3');
Route::get('/wisatawans/page4', 'WisatawanController@page4');
Route::get('/wisatawans/page5', 'WisatawanController@page5');
Route::get('/wisatawans/page6', 'WisatawanController@page6');


Route::get('/kategoriobjek/{kategori}', 'ObjekController@cariobjek');
