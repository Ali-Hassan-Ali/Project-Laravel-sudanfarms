<?php

use App\Http\Controllers\Dashboard\WelcomController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoreyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', [WelcomController::class,'index'])->name('welcome');

        //user routes
        Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        Route::resource('categoreys', CategoreyController::class)->except(['show']);

    }); //end of dashboard routesz

});//LaravelLocalization
