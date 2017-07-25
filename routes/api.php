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

Route::get('/product/index', 'Api\ProductController@index');
Route::get('/product/{product}', 'Api\ProductController@show');
Route::get('/user/{user}', 'Api\UserController@show');
Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('search', 'Api\SearchController@search');

Route::prefix('user')->group(function() {
	Route::post('order', 'Api\OrderController@order');
});

