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

Route::post('send', 'PageController@sendMessage');

Route::get('stores', 'PageController@viewStores');

Route::get('expiring', 'PageController@viewExpiring');

// Sluggers
Route::get('view/{slug}', 'PageController@viewSlug');

Route::get('types/{slug}', 'PageController@viewType');

Auth::routes();

Route::get('dashboard', 'DashBoardController@index')->name('dashboard');

// Offer Routes
Route::get('offer/create', 'OfferController@create');

Route::post('offer', 'OfferController@store');

Route::get('offer', 'OfferController@index');

Route::get('offer/{offer}', 'OfferController@show');

Route::get('offer/{offer}/edit', 'OfferController@edit');

Route::put('offer/{offer}', 'OfferController@update');

Route::get('offer/archive/{offer}', 'OfferController@archive');

Route::delete('offer/{offer}', 'OfferController@destroy');

Route::get('offer/csv', 'OfferController@download');

Route::post('offer/bulk', 'OfferController@bulk');

Route::get('offer/bulk', 'OfferController@bulk');

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

// Contact Routes
Route::get('contact', 'ContactController@index');

Route::get('contact/{contact}', 'ContactController@show');

Route::delete('contact/{contact}', 'ContactController@destroy');

// Quad Routes
Route::get('quad', 'QuadController@index');

Route::get('quad/create', 'QuadController@create');

Route::post('quad', 'QuadController@store');

Route::get('quad/{quad}', 'QuadController@show');

Route::get('quad/{quad}/edit', 'QuadController@edit');

Route::put('quad/{quad}', 'QuadController@update');

Route::delete('quad/{quad}', 'QuadController@destroy');

// Store Routes
Route::get('store', 'StoreController@index');

Route::get('store/create', 'StoreController@create');

Route::post('store', 'StoreController@store');

Route::get('store/{store}', 'StoreController@show');

Route::get('store/{store}/edit', 'StoreController@edit');

Route::put('store/{store}', 'StoreController@update');

Route::delete('store/{store}', 'StoreController@destroy');

// Upload Routes
Route::get('upload/{network}', 'UploadController@create');

Route::post('upload/{network}', 'UploadController@store');
