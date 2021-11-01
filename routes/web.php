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

Route::group(['prefix' => '/dashboard', 'as' => 'dashboard'], function () {
    Route::view('/', 'customer.dashboard');
});

Auth::routes();
