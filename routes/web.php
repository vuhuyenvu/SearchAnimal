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