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

Route::get('/', 'SiteController@index')->name('Home');



Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/category', 'CategoryController@index')->name('categories');
    Route::get('/category/{name}', 'CategoryController@filterCategory')->name('byCategory');
    Route::get('/{news}', 'NewsController@show')->name('show');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::resource('news', 'NewsController');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
