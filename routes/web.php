<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\Home\WelcomController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\PromotedDealerController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\HeaderController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::get('login', [AuthController::class,'login'])->name('home.login');
    Route::post('login', [AuthController::class,'store_login'])->name('home.login.store');

    Route::get('register', [AuthController::class,'register'])->name('home.register');
    Route::post('register', [AuthController::class,'store_register'])->name('home.register.store');

    Route::post('logout', [AuthController::class,'user_logout'])->name('home.logout');

    Route::get('/', [WelcomController::class,'index'])->name('welcome.index');

    //header contact
    Route::get('contact', [HeaderController::class,'contact'])->name('home.contact');
    Route::post('contact', [HeaderController::class,'contactStore'])->name('home.contact.store');

    //header suppliers
    Route::get('suppliers', [HeaderController::class,'supplier'])->name('home.supplier');
    Route::get('product/{product}', [HeaderController::class,'show_product'])->name('product.show');
    Route::get('category/{id}', [HeaderController::class,'show_category'])->name('category.show');


    Route::middleware(['auth'])->group(function () {
        //profile routes
        Route::get('/my_acount', [ProfileController::class,'index'])->name('profile.index');
        Route::get('/change_password', [ProfileController::class,'passwprd_index'])->name('change_password.index');
        Route::post('/change_password', [ProfileController::class,'passwprd_store'])->name('change_password.store');

        //promoted_dealers route
        Route::get('/promoted_dealers', [PromotedDealerController::class,'index'])->name('promoted_dealers.index');
        Route::post('/promoted_dealers', [PromotedDealerController::class,'store'])->name('promoted_dealers.store');
        Route::get('/promoted_dealers.edit', [PromotedDealerController::class,'edit'])->name('promoted_dealers.edit');
        Route::post('/promoted_dealers.update', [PromotedDealerController::class,'update'])->name('promoted_dealers.update');
        Route::get('/promoted_dealers.destroy', [PromotedDealerController::class,'update'])->name('promoted_dealers.destroy');

        //products routes
        Route::resource('products', ProductController::class);

        // Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        // Route::resource('categoreys', CategoreyController::class)->except(['show']);

    }); //end of dashboard routesz

    // Auth::routes(['register'=> false,'login'=> false]);

});//LaravelLocalization