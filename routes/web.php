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

Route::get('/', 'PageController@welcome');

Route::post('/results', 'PageController@results');

Route::get('blog', 'PageController@indexBlog');

Route::get('blog/{slug}', 'PageController@viewBlog');

Route::post('blog/{blog}', 'PageController@insertComment');

Route::get('about', 'PageController@viewAbout');

Route::get('privacy', 'PageController@viewPrivacy');

Route::get('terms', 'PageController@viewTerms');

Route::post('contact', 'PageController@sendMessage');

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

// Type Routes
Route::get('type', 'TypeController@index');

Route::get('type/create', 'TypeController@create');

Route::post('type', 'TypeController@store');

Route::get('type/{type}/edit', 'TypeController@edit');

Route::put('type/{type}', 'TypeController@update');

Route::delete('type/{type}', 'TypeController@destroy');

// User Routes
Route::get('user', 'UserController@index');

// Blogs Routes
Route::get('blogger', 'BlogController@index');

Route::get('blogger/create', 'BlogController@create');

Route::post('blogger', 'BlogController@store');

Route::get('blogger/{blog}', 'BlogController@show');

Route::get('blogger/{blog}/edit', 'BlogController@edit');

Route::put('blogger/{blog}', 'BlogController@update');

Route::get('blogger/archive/{blog}', 'BlogController@archive');

Route::delete('blogger/{blog}', 'BlogController@destroy');

Route::delete('blog/comment/{blogComment}', 'BlogCommentController@destroy');