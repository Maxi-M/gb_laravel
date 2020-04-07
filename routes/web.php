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
    Route::post('/store', 'NewsController@store')->name('store');
    Route::get('/category', 'CategoryController@index')->name('categories');
    Route::get('/category/{name}', 'CategoryController@filterCategory')->name('byCategory');
    Route::get('/{id}', 'NewsController@show')->name('show');
});



Route::group([
    'prefix' => 'admin',
    //'namespace' => '',
    'as' => 'admin.'
], function () {
    Route::get('/add-news', 'AdminController@addNews')->name('newsAdd');
});



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
