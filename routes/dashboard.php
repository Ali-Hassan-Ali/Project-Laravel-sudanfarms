<?php

use App\Http\Controllers\Dashboard\WelcomController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\CategoreyController;
use App\Http\Controllers\Dashboard\SubCategoreyController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::get('/Dashboard/login', [LoginController::class,'index'])->name('dashboard.login.index');
    Route::post('/Dashboard/login', [LoginController::class,'store'])->name('dashboard.login.store');
    Route::post('/Dashboard/logout', [LoginController::class,'seller_logout'])->name('dashboard.logout');

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', [WelcomController::class,'index'])->name('welcome');

        //user routes
        Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        Route::resource('categoreys', CategoreyController::class)->except(['show']);

        //sub categoreys routes
        Route::resource('sub_categoreys', SubCategoreyController::class)->except(['show']);

        //products routes
        Route::resource('products', ProductController::class)->except(['show']);

    }); //end of dashboard routesz

});//LaravelLocalization
