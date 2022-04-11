<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('client.home.index');
});
Route::get('/grid', function () {
    return view('client.home.grid');
});
Route::get('/respond', function () {
    return view('client.home.respond');
});
Route::get('/detail', function () {
    return view('client.home.detail');
});


Route::get('/admin-dashboard', function () {
    return view('admin.home.index');
});


Route::get('/login-user', function () {

    return view('login');
});

//Admin routes
Route::get('/bo','App\Http\Controllers\AdminController@bo');
Route::post('/them-bo','App\Http\Controllers\AdminController@them_bo');
Route::post('/sua-bo','App\Http\Controllers\AdminController@sua_bo');
Route::post('/xoa-bo','App\Http\Controllers\AdminController@xoa_bo');
Route::POST('/tim-kiem-bo','App\Http\Controllers\AdminController@tim_kiem_bo');



Route::get('/dia-diem','App\Http\Controllers\AdminController@dia_diem');

Route::get('/ho','App\Http\Controllers\AdminController@ho');

Route::get('/gioi', 'App\Http\Controllers\AdminController@gioi');

Route::get('/lop', 'App\Http\Controllers\AdminController@lop');



Route::get('/nganh', function () {
    return view('nganh');
});