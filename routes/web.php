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
//    return view('welcome');
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'ProfileController@show']);
Route::get('/profile/edit/{id}', ['as' => 'profile.edit', 'uses' =>'ProfileController@edit'])->middleware('auth');
Route::post('/profile/edit/{id}/changePassword', ['as' => 'profile.edit.password', 'uses' => 'ProfileController@changePassword']);
Route::post('/profile/edit/{id}/changeInfo', ['as' => 'profile.edit.info', 'uses' => 'ProfileController@changeInfo']);