<?php

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
    return view('admin/layouts/xianchang');
});
Route::resource('admin/category','Admin\CategoryController');
Route::resource('admin/goods','Admin\GoodsController');
