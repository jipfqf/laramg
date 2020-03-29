<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api'], function () {
	Route::any('auth/login', 'AuthController@login');
	Route::get('auth/user', 'AuthController@user');
	Route::get('verfycode', 'AuthController@verfycode');
	Route::post('upload', 'FileController@fileUpload');
	Route::group(['namespace'=>'Admin','middleware' => ['auth:api','permission']], function () {

	});
});
