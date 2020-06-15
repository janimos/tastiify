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

Route::get('/', function () {
    return view('shop.index');
});
/*
Route::get('/test', function () {
    return view('shop.test');
});
*/
Route::get('/products', 'ProductController@index');
Route::get('/products/create', function () {
    return view('shop.admin_pages.add_product');
});
Route::get('/products/delete', 'AdminController@delete_products');
Route::get('/products/create', 'ProductController@show_create');
Route::get('/products/edit', 'ProductController@show_edit');

Route::get('/cart', 'CartController@show');
Route::get('/cart/remove/{product_id}', 'CartController@destroy');

Route::get('/orders', 'CartController@order');
Route::get('/orders/show/{order_id}','CartController@index');

Route::get('/country/product/{product_id}', 'ProductController@show');
Route::get('/country/create', function () {
    return view('shop.admin_pages.add_country');
});
Route::get('/country/delete', 'AdminController@delete_countries');

Route::get('/admin', 'AdminController@index');

Route::get('/keyword/create', 'KeywordController@index');
Route::patch('/keyword_create', 'KeywordController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('/country_create', 'CountryController@create');
Route::patch('/product_create', 'ProductController@create');
Route::patch('/comment', 'ProductController@store');
Route::patch('/add_to_cart', 'CartController@store');
Route::patch('/order', 'CartController@create');

Route::get('/redirect', 'Auth\LoginController@redirectToGoogle');
Route::get('/callback', 'Auth\LoginController@handleGoogleCallback');
