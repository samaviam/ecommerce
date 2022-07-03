<?php

use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminBrandsController;
use App\Http\Controllers\Admin\AdminCurrencyController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminLocalizationController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminSpecificPriceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAddressController;
use App\Http\Controllers\Auth\LoginController;

$admin = config('app.admin');

Route::get('/' . $admin . '/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/' . $admin . '/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/' . $admin . '/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
Route::group(['prefix' => $admin, 'as' => 'admin', 'middleware' => 'auth:employee'], function () use ($admin) {
    Route::redirect('/', '/' . $admin . '/dashboard');
    Route::view('/dashboard', 'admin.dashboard');

    Route::group(['as' => '.'], function () {
        // Orders
        Route::resource('orders', AdminOrdersController::class)->except('show');

        // CATALOG
        Route::resources([
            'products' => AdminProductsController::class,
            'categories' => AdminCategoriesController::class,
            'brands' => AdminBrandsController::class,
        ]);
        Route::post('/products/{product}/change-status', [AdminProductsController::class, 'changeStatus'])->name('products.change-status');
        Route::post('/categories/{category}/change-status', [AdminCategoriesController::class, 'changeStatus'])->name('categories.change-status');
        Route::post('/brands/{brand}/change-status', [AdminBrandsController::class, 'changeStatus'])->name('brands.change-status');
        Route::resource('specific-price', AdminSpecificPriceController::class)->except('show');
        Route::post('/specific-price/{product}/change-status', [AdminSpecificPriceController::class, 'changeStatus'])->name('specific-price.change-status');

        // CUSTOMER
        Route::resource('user', AdminUserController::class)->except('show');
        Route::resource('address', AdminAddressController::class)->except('show');
        Route::resource('banner', AdminBannerController::class)->except('show');

        // INTERNATIONAL
        Route::get('/localization', [AdminLocalizationController::class, 'index'])->name('localization.index');
        Route::post('/localization', [AdminLocalizationController::class, 'store'])->name('localization.store');
        Route::resource('language', AdminLanguageController::class)->except('show');
        Route::post('/language/{language}/change-status', [AdminLanguageController::class, 'changeStatus'])->name('language.change-status');
        Route::resource('currency', AdminCurrencyController::class)->except('show');
        Route::post('/currency/get', [AdminCurrencyController::class, 'get'])->name('currency.get');
        Route::post('/currency/{currency}/change-status', [AdminCurrencyController::class, 'changeStatus'])->name('currency.change-status');
    });
});
