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

//admin
Route::get('admin/login','AdminController@login')->name('admin.login');
Route::post('admin/post_login','AdminController@postLogin')->name('admin.post_login');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin');
	//category
	Route::get('category', 'CategoryController@index');
	Route::get('category/{id}/edit', 'CategoryController@edit');
	Route::post('category/store', 'CategoryController@store');
	Route::get('category/delete/{id}', 'CategoryController@destroy');
	//subcategory
	Route::get('subcategory', 'SubCategoryController@index');
	Route::get('subcategory/{id}/edit', 'SubCategoryController@edit');
	Route::post('subcategory/store', 'SubCategoryController@store');
	Route::get('subcategory/delete/{id}', 'SubCategoryController@destroy');
	//post
	Route::get('post', 'PostController@index');
	Route::get('post/{id}/edit', 'PostController@edit');
	Route::post('post/store', 'PostController@store');
	Route::get('post/delete/{id}', 'PostController@destroy');
	Route::get('post/getSubcategory', 'PostController@getSubcategory');
	//contact
	Route::get('contact', 'ContactController@index');
	Route::get('contact/{id}/reply', 'ContactController@reply');
	Route::post('contact/post_reply', 'ContactController@post_reply');
	Route::get('contact/delete/{id}', 'ContactController@destroy');
});

//client
Route::get('/', 'ClientController@index');
Route::post('/loadmore/load_data', 'ClientController@load_data')->name('loadmore.load_data');

Route::get('{slug}.html', 'ClientController@getDetail');

Route::get('/contact', 'ClientController@contact');
Route::post('/post_contact', 'ContactController@add');
