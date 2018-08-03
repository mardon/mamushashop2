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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/addcart', 'AjaxController@store');
Route::get('/cartdelete/{id}', 'CartController@delete');
Route::get('/cartdestroy', 'CartController@destroy');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function () {
    Route::get('/', 'DashBoardController@index');
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('/category/update/{id}', 'Admin\CategoryController@update');
    Route::get('/category/create', 'Admin\CategoryController@create');
    Route::post('/category/store', 'Admin\CategoryController@store');
    Route::delete('/category/destroy/{id}', 'Admin\CategoryController@destroy');
});
