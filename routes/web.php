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



Route::get('/', 'App\Http\Controllers\HomeController@home_loaddata')->name('trang-chu');


Route::get('/grid','App\Http\Controllers\HomeController@grid')->name('grid');
Route::get('search', 'App\Http\Controllers\HomeController@getSearch');
Route::post('search/name','App\Http\Controllers\HomeController@getSearchAjax')->name('search');

Route::get('/respond','App\Http\Controllers\HomeController@respond')->name('respond');

Route::get('/detail', function () {
    return view('client.home.detail');
});
Route::get('/detail/{id}','App\Http\Controllers\HomeController@detail')->name('chi-tiet');





Route::get('/login-user', function () {
    return view('login');
});


//Admin routes

Route::get('/admin-login','App\Http\Controllers\AdminController@admin_login');
Route::POST('/dang-nhap-admin','App\Http\Controllers\AdminController@dang_nhap_admin');

Route::get('/log-out-admin','App\Http\Controllers\AdminController@log_out_admin');


Route::get('/admin-dashboard','App\Http\Controllers\AdminController@index');

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


Route::get('/nganh', function () {
    return view('nganh');
});




// Comment
Route::post('comment/{id}','App\Http\Controllers\CommentController@them_comment');
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

Route::get('/sinh-canh', 'App\Http\Controllers\AdminController@sinh_canh');
Route::post('/them-sinh-canh', 'App\Http\Controllers\AdminController@them_sinh_canh');
Route::post('/sua-sinh-canh', 'App\Http\Controllers\AdminController@sua_sinh_canh');
Route::post('/xoa-sinh-canh', 'App\Http\Controllers\AdminController@xoa_sinh_canh');
Route::post('/tim-kiem-sinh-canh', 'App\Http\Controllers\AdminController@tim_kiem_sinh_canh');

Route::get('/phan-bo', 'App\Http\Controllers\AdminController@phan_bo');
Route::post('/them-phan-bo', 'App\Http\Controllers\AdminController@them_phan_bo');
Route::post('/sua-phan-bo', 'App\Http\Controllers\AdminController@sua_phan_bo');
Route::post('/xoa-phan-bo', 'App\Http\Controllers\AdminController@xoa_phan_bo');
Route::post('/tim-kiem-phan-bo', 'App\Http\Controllers\AdminController@tim_kiem_phan_bo');

//ĐỘNG VẬT
Route::get('/dong-vat', 'App\Http\Controllers\AdminController@dong_vat');
Route::get('/dong-vat/lay-danh-sach-dv', 'App\Http\Controllers\AdminController@lay_danh_sach_dv');
Route::POST('/dong-vat/them-dong-vat', 'App\Http\Controllers\AdminController@them_dv');
Route::POST('/dong-vat/xem-chi-tiet', 'App\Http\Controllers\AdminController@xem_chi_tiet');
Route::POST('/dong-vat/xem-hinh-anh-dv', 'App\Http\Controllers\AdminController@xem_hinh_anh_dv');
Route::POST('/dong-vat/them-hinh-anh-moi', 'App\Http\Controllers\AdminController@them_hinh_anh_moi');
Route::POST('/dong-vat/xoa-hinh-anh', 'App\Http\Controllers\AdminController@xoa_hinh_anh');
Route::POST('/dong-vat/lay-cac-field-len-modal', 'App\Http\Controllers\AdminController@lay_cac_field_len_modal');
Route::POST('/dong-vat/sua-dong-vat', 'App\Http\Controllers\AdminController@sua_dong_vat');
Route::POST('/dong-vat/xoa-dv', 'App\Http\Controllers\AdminController@xoa_dv');

//Địa Điểm
Route::POST('/dong-vat/xem-dia-diem', 'App\Http\Controllers\AdminController@xem_dia_diem');
Route::POST('/dong-vat/lay-ds-diadiem', 'App\Http\Controllers\AdminController@lay_ds_diadiem');
Route::POST('/dong-vat/them-dia-diem', 'App\Http\Controllers\AdminController@them_dia_diem');
Route::POST('/dong-vat/xoa-dia-diem', 'App\Http\Controllers\AdminController@xoa_dia_diem');




//Sinh cảnh
Route::POST('/dong-vat/xem-sinh-canh', 'App\Http\Controllers\AdminController@xem_sinh_canh');
Route::POST('/dong-vat/lay-ds-sinhcanh', 'App\Http\Controllers\AdminController@lay_ds_sinhcanh');
Route::POST('/dong-vat/them-sinh-canh', 'App\Http\Controllers\AdminController@them_sinhcanh');
Route::POST('/dong-vat/xoa-sinhcanh', 'App\Http\Controllers\AdminController@xoa_sinhcanh');


//Bình Luận

Route::get('/binh-luan', 'App\Http\Controllers\AdminController@binh_luan');
Route::get('/xoa-binh-luan/{bl_id}', 'App\Http\Controllers\AdminController@xoa_binh_luan');
