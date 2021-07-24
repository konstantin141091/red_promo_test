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

Auth::routes();

// index page
Route::get('/', 'IndexController@index')->name('index');

//routes for news
Route::group([
    'prefix' => 'news',
    'as' => 'news.',
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/show/{news}', 'NewsController@show')->name('show');
    Route::get('/find', 'NewsController@find')->name('find');
    Route::post('/favorites/{id}', 'NewsController@addNewsForFavorite')->name('favorites')
        ->middleware('auth');
    Route::get('/favorites', 'NewsController@favoritesUserNews')->name('favorites')
        ->middleware('auth');
});


