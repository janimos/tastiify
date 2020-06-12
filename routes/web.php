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
Route::get('/products', function () {
    return view('shop.search');
});

Route::get('/cart', function () {
    return view('shop.cart');
});

Route::get('/orders', function () {
    return view('shop.orders');
});

Route::get('/orders/show', function () {
    return view('shop.show_order');
});

Route::get('/country/product', function () {
    return view('shop.show_product');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
