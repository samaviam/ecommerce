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

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'index')->name('home');
Route::view('/washlist', 'wishlist')->name('wishlist');
Route::view('/cart', 'cart')->name('cart');
Route::view('/shop', 'shop')->name('shop');
Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/contact-us', 'contact-us')->name('contact-us');
Route::view('/product/{aliases?}', 'product')->name('product');

Route::group(['prefix' => '/dashboard', 'as' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::view('/', 'customer.dashboard');
    Route::view('/order-history', 'customer.order-history')->name('.order-history');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/admin', 'as' => 'admin'], function () {
    Route::view('/dashboard', 'admin.dashboard');
});