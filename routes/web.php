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

Route::group(['middleware' => 'web'], function () {
	Route::any('/admin{any}', 'LaravueController@admin')->where('any', '.*');
	Route::any('/wap{any}', 'LaravueController@wap')->where('any', '.*');
	Route::any('/{any}', 'LaravueController@index')->where('any', '.*');
});
