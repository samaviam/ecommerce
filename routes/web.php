<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\WishListController;

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
| Admin Routes
|--------------------------------------------------------------------------
*/
require 'admin.php';

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::group([
    'prefix' => '/dashboard',
    'as' => 'dashboard',
    'controller' => DashboardController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/', 'dashboard');

    Route::group(['as' => '.'], function () {
        Route::get('/order-history', 'orderHistory')->name('order-history');
        Route::get('/wishlist', 'wishlist')->name('wishlist');

        Route::resource('addresses', AddressController::class);
    });
});

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/currency/{code}', [FrontController::class, 'changeCurrency'])->name('currency');
Route::get('/language/{code}', [FrontController::class, 'changeLanguage'])->name('language');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
Route::get('/checkout', [FrontController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::resource('/cart', CartController::class);
Route::resource('/wishlist', WishListController::class);

Route::get('/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [FrontController::class, 'product'])->name('product');