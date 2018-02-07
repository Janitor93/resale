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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'ProfileController@show']);
Route::get('/profile/edit/{id}', ['as' => 'profile.edit', 'uses' =>'ProfileController@edit'])->middleware('auth');
Route::post('/profile/edit/{id}/changePassword', ['as' => 'profile.edit.password', 'uses' => 'ProfileController@changePassword']);
Route::post('/profile/edit/{id}/changeInfo', ['as' => 'profile.edit.info', 'uses' => 'ProfileController@changeInfo']);
Route::get('/product/add', 'ProductController@add')->middleware('auth');
Route::post('/product/save', ['as' => 'product.save', 'uses' => 'ProductController@save']);
Route::get('/product/{id}', ['as' => 'product.id', 'uses' => 'ProductController@get']);
Route::post('/order/save', 'OrderController@create');
Route::get('/product/{id}/list', ['as' => 'product.list', 'uses' =>'ProductController@getMyProducts'])->middleware('auth');
Route::get('/product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@editPage'])->middleware('auth');
Route::post('/product/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);
Route::get('/user/order/list', ['as' => 'order.list', 'uses' => 'OrderController@getUserList'])->middleware('auth');