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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
Route::get('/', 'FrontController@index');

Route::get('/news', 'FrontController@news');

Auth::routes();


Route::group(['middleware' => ['auth'],'prefix'=>'/home'], function () {

        // 首頁

        Route::get('/', 'HomeController@index');

        
       //最新消息管理-後台
        Route::resource('news','NewsController');



        // Route::get('/news', 'NewsController@index');//首頁
        // Route::get('/news/create', 'NewsController@create');//引導到頁面
        // Route::post('/news/store', 'NewsController@store');//儲存

        // Route::get('/news/edit/{id}', 'NewsController@edit'); //編輯文章
        // Route::post('/news/update/{id}', 'NewsController@update');//更新某篇文章
        // Route::post('/news/delete', 'NewsController@delete');


});
