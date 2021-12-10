<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishListController;
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

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::group(['prefix' => '/dashboard', 'as' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::view('/', 'customer.dashboard');
    Route::view('/order-history', 'customer.order-history')->name('.order-history');
});

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::resource('/cart', CartController::class);
Route::resource('/wishlist', WishListController::class);

Route::get('/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [FrontController::class, 'product'])->name('product');