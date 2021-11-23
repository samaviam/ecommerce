<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminCategoriesController;

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
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
Route::get('/product/{slug}', [FrontController::class, 'product'])->name('product');
Route::get('/washlist', [FrontController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::resource('/cart', CartController::class);

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

    Route::group(['as' => '.'], function () {
        Route::resource('/products', AdminProductsController::class);
        Route::resource('/categories', AdminCategoriesController::class);
    });
});