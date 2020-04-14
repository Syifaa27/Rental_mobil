<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');

Route::post('penyewa', 'PenyewaController@store')->middleware('jwt.verify');
Route::put('penyewa_edit/{id}', 'PenyewaController@update')->middleware('jwt.verify');
Route::get('tampil_penyewa', 'PenyewaController@tampil')->middleware('jwt.verify');
Route::delete('hapus_penyewa/{id}', 'PenyewaController@destroy')->middleware('jwt.verify');

Route::post('data_mobil', 'DataMobilController@store')->middleware('jwt.verify');
Route::put('data_edit/{id}', 'DataMobilController@update')->middleware('jwt.verify');
Route::get('tampil_data', 'DataMobilController@tampil')->middleware('jwt.verify');
Route::delete('hapus_data/{id}', 'DataMobilController@destroy')->middleware('jwt.verify');

Route::post('jenis_mobil', 'JenisMobilController@store')->middleware('jwt.verify');
Route::put('jenis_edit/{id}', 'JenisMobilController@update')->middleware('jwt.verify');
Route::get('tampil_jenis', 'JenisMobilController@tampil')->middleware('jwt.verify');
Route::delete('hapus_jenis/{id}', 'JenisMobilController@destroy')->middleware('jwt.verify');
