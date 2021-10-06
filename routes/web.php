<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\Home\WelcomController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::get('login', [AuthController::class,'login'])->name('home.login');
    Route::post('login', [AuthController::class,'store_login'])->name('home.login.store');

    Route::get('register', [AuthController::class,'register'])->name('home.register');
    Route::post('register', [AuthController::class,'store_register'])->name('home.register.store');

    Route::post('logout', [AuthController::class,'user_logout'])->name('home.logout');

    Route::get('/', [WelcomController::class,'index'])->name('welcome.index');

    Route::middleware(['auth'])->group(function () {
        //user routes
        // Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        // Route::resource('categoreys', CategoreyController::class)->except(['show']);

    }); //end of dashboard routesz

    // Auth::routes(['register'=> false,'login'=> false]);

});//LaravelLocalization