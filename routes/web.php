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

Route::get('/diadiem','App\Http\Controllers\AdminController@diadiem');
Route::post('/them-diadiem','App\Http\Controllers\AdminController@them_diadiem');
Route::post('/sua-diadiem','App\Http\Controllers\AdminController@sua_diadiem');
Route::post('/xoa-diadiem','App\Http\Controllers\AdminController@xoa_diadiem');
Route::POST('/tim-kiem-diadiem','App\Http\Controllers\AdminController@tim_kiem_diadiem');

Route::get('/ho','App\Http\Controllers\AdminController@ho');
Route::post('/them-ho','App\Http\Controllers\AdminController@them_ho');
Route::post('/sua-ho','App\Http\Controllers\AdminController@sua_ho');
Route::post('/xoa-ho','App\Http\Controllers\AdminController@xoa_ho');
Route::POST('/tim-kiem-ho','App\Http\Controllers\AdminController@tim_kiem_ho');

Route::get('/gioi', 'App\Http\Controllers\AdminController@gioi');
Route::post('/them-gioi','App\Http\Controllers\AdminController@them_gioi');
Route::post('/sua-gioi','App\Http\Controllers\AdminController@sua_gioi');
Route::post('/xoa-gioi','App\Http\Controllers\AdminController@xoa_gioi');
Route::POST('/tim-kiem-gioi','App\Http\Controllers\AdminController@tim_kiem_gioi');

Route::get('/lop', 'App\Http\Controllers\AdminController@lop');
Route::post('/them-lop','App\Http\Controllers\AdminController@them_lop');
Route::post('/sua-lop','App\Http\Controllers\AdminController@sua_lop');
Route::post('/xoa-lop','App\Http\Controllers\AdminController@xoa_lop');
Route::POST('/tim-kiem-lop','App\Http\Controllers\AdminController@tim_kiem_lop');


Route::get('/nganh', 'App\Http\Controllers\AdminController@nganh');
Route::post('/them-nganh','App\Http\Controllers\AdminController@them_nganh');
Route::post('/sua-nganh','App\Http\Controllers\AdminController@sua_nganh');
Route::post('/xoa-nganh','App\Http\Controllers\AdminController@xoa_nganh');
Route::POST('/tim-kiem-nganh','App\Http\Controllers\AdminController@tim_kiem_nganh');

Route::get('/tinhtrangmauvat', 'App\Http\Controllers\AdminController@tinhtrangmauvat');
Route::post('/them-tinhtrangmauvat','App\Http\Controllers\AdminController@them_tinhtrangmauvat');
Route::post('/sua-tinhtrangmauvat','App\Http\Controllers\AdminController@sua_tinhtrangmauvat');
Route::post('/xoa-tinhtrangmauvat','App\Http\Controllers\AdminController@xoa_tinhtrangmauvat');
Route::POST('/tim-kiem-tinhtrangmauvat','App\Http\Controllers\AdminController@tim_kiem_tinhtrangmauvat');

Route::get('/bao-ton-theo-vn', 'App\Http\Controllers\AdminController@bao_ton_theo_vn');
Route::post('/them-bao-ton-theo-vn', 'App\Http\Controllers\AdminController@them_bao_ton_theo_vn');
Route::post('/sua-bao-ton-theo-vn', 'App\Http\Controllers\AdminController@sua_bao_ton_theo_vn');
Route::post('/xoa-bao-ton-theo-vn', 'App\Http\Controllers\AdminController@xoa_bao_ton_theo_vn');
Route::post('/tim-kiem-bao-ton-theo-vn', 'App\Http\Controllers\AdminController@tim_kiem_bao_ton_theo_vn');

Route::get('/bao-ton-theo-nghi-dinh', 'App\Http\Controllers\AdminController@bao_ton_theo_nghi_dinh');
Route::post('/them-bao-ton-theo-nghi-dinh', 'App\Http\Controllers\AdminController@them_bao_ton_theo_nghi_dinh');
Route::post('/sua-bao-ton-theo-nghi-dinh', 'App\Http\Controllers\AdminController@sua_bao_ton_theo_nghi_dinh');
Route::post('/xoa-bao-ton-theo-nghi-dinh', 'App\Http\Controllers\AdminController@xoa_bao_ton_theo_nghi_dinh');
Route::post('/tim-kiem-bao-ton-theo-nghi-dinh', 'App\Http\Controllers\AdminController@tim_kiem_bao_ton_theo_nghi_dinh');

Route::get('/bao-ton-theo-uicn', 'App\Http\Controllers\AdminController@bao_ton_theo_uicn');
Route::post('/them-bao-ton-theo-uicn', 'App\Http\Controllers\AdminController@them_bao_ton_theo_uicn');
Route::post('/sua-bao-ton-theo-uicn', 'App\Http\Controllers\AdminController@sua_bao_ton_theo_uicn');
Route::post('/xoa-bao-ton-theo-uicn', 'App\Http\Controllers\AdminController@xoa_bao_ton_theo_uicn');
Route::post('/tim-kiem-bao-ton-theo-uicn', 'App\Http\Controllers\AdminController@tim_kiem_bao_ton_theo_uicn');

Route::get('/bao-ton-theo-cites', 'App\Http\Controllers\AdminController@bao_ton_theo_cites');
Route::post('/them-bao-ton-theo-cites', 'App\Http\Controllers\AdminController@them_bao_ton_theo_cites');
Route::post('/sua-bao-ton-theo-cites', 'App\Http\Controllers\AdminController@sua_bao_ton_theo_cites');
Route::post('/xoa-bao-ton-theo-cites', 'App\Http\Controllers\AdminController@xoa_bao_ton_theo_cites');
Route::post('/tim-kiem-bao-ton-theo-cites', 'App\Http\Controllers\AdminController@tim_kiem_bao_ton_theo_cites');

