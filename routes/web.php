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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'news'], function (){
   Route::match(['post','get'], '/add', 'NewsController@add')->name('add-news');
   Route::match(['post','get'], '/delete', 'NewsController@delete')->name('delete-news');
});
