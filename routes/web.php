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
Route::get('/category', 'CategoryController@index')->name('Categories');
Route::get('/category/{name}', 'CategoryController@filterCategory')->name('NewsByCategory');


Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    //'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('News');
    Route::get('/add', 'NewsController@add')->name('NewsAdd');
    Route::get('/{id}', 'NewsController@show')->name('NewsOne');

});
