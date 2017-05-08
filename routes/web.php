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
    return view('pages.welcome');
});

Auth::routes();

Route::get('dashboard', 'DashBoardController@index')->name('dashboard');

// Offer Routes
Route::get('offer/create', 'OfferController@create');

Route::post('offer', 'OfferController@store');

Route::get('offer', 'OfferController@index');

//Route::get('offer/{offer}', 'OfferController@show'); handled by modal

Route::get('offer/{offer}/edit', 'OfferController@edit');

Route::put('offer/{offer}', 'OfferController@update');

Route::get('offer/archive/{offer}', 'OfferController@archive');

Route::delete('offer/{offer}', 'OfferController@destroy');

// Category Routes
Route::delete('category/{category}', 'CategoryController@destroy');