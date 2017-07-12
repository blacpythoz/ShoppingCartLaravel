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
	return view('welcome');
});

Route::prefix('admin')->group(function() {
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/product/create', 'ProductController@create')->name('product.create');
	Route::get('/product/index', 'ProductController@index')->name('product.index');
	Route::post('/product/store', 'ProductController@store')->name('product.store');
	Route::post('/product/search', 'ProductController@search')->name('product.search');
	Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
	//Route::get('/product/{id}/delete', 'ProductController@destroy')->name('product.delete');
	Route::post('/product/{id}/update', 'ProductController@update')->name('product.update');
});