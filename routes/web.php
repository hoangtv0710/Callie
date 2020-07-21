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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index');
	//category
	Route::get('category', 'CategoryController@index');
	Route::get('category/{id}/edit', 'CategoryController@edit');
	Route::post('category/store', 'CategoryController@store');
	Route::get('category/delete/{id}', 'CategoryController@destroy');
});