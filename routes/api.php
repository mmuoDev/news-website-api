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


//articles
Route::get('articles', 'API\ArticleController@index'); //fetch all articles
Route::get('articles/{article}', 'API\ArticleController@show'); //get an article
