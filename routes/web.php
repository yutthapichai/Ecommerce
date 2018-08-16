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

Route::get('/', 'FrontendController@index')->name('index');

Route::get('/product/{id}', 'FrontendController@single')->name('product.single');

Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');

Route::get('/cart', 'ShoppingController@cart')->name('cart');

Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');

Route::get('/cart/reduce/{id}/{qty}', 'ShoppingController@reduce')->name('cart.reduce');

Route::get('/cart/recrement/{id}/{qty}', 'ShoppingController@recrement')->name('cart.recrement');

Route::get('/cart/rapid/add/{id}', 'ShoppingController@rapid_add')->name('cart.rapid.add');

Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductsController');
