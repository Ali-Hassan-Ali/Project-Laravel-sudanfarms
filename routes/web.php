<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home\LoginController;
use App\Http\Controllers\Home\WelcomController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::get('login', [LoginController::class,'index'])->name('home.login.index');
    Route::post('login', [LoginController::class,'store'])->name('home.login.store');
    Route::post('logout', [LoginController::class,'seller_logout'])->name('home.logout');

    Route::get('/', [WelcomController::class,'index'])->name('welcome.index');

    Route::middleware(['auth'])->group(function () {
        //user routes
        // Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        // Route::resource('categoreys', CategoreyController::class)->except(['show']);

    }); //end of dashboard routesz

    // Auth::routes(['register'=> false,'login'=> false]);

});//LaravelLocalization