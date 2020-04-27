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
    'prefix' => 'profile',
    'as' => 'profile.',
    'middleware' => ['auth']
], function() {
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::patch('/update', 'ProfileController@update')->name('update');
});


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
    'as' => 'admin.',
    'middleware' => ['auth', 'isAdmin']
], function () {
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::resource('news', 'NewsController');
    Route::resource('category', 'CategoryController');
    Route::patch('/category/disable/{category}', 'CategoryController@disable')->name('category.disable');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::patch('/toggle-admin/{user}', 'UserController@toggleAdmin')->name('users.toggleAdmin');
});

Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');
