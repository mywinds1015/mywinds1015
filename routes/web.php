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

// use Illuminate\Routing\Route;

Route::get('/', 'FrontController@index');

Route::get('/news', 'FrontController@news');

Auth::routes();


Route::group(['middleware' => ['auth'],'prefix'=>'/home'], function () {

        //首頁
        Route::get('/', 'HomeController@index');

        //最新消息管理
        Route::get('/news', 'NewsController@index');
        Route::post('/news/store', 'NewsController@store');
        Route::post('/news/update', 'NewsController@edit');
        Route::post('/news/delete', 'NewsController@delete');


});
