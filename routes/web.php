<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\Home\WelcomController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\PromotedDealerController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\HeaderController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\OfferController;
use App\Http\Controllers\Home\SocialController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {
    Route::get('/dd', function() {

        return Cart::content();
        return Cart::destroy();

    });
    Route::get('login', [AuthController::class,'login'])->name('home.login');
    Route::post('login', [AuthController::class,'store_login'])->name('home.login.store');

    Route::get('register', [AuthController::class,'register'])->name('home.register');
    Route::post('register', [AuthController::class,'store_register'])->name('home.register.store');

    // login Social
    Route::get('login/{provider}', [SocialController::class,'redirectToProvider'])->where('provider', 'facebook|google');
    Route::get('login/{provider}/callback', [SocialController::class,'handleProviderCallback'])->where('provider', 'facebook|google');

    Route::post('logout', [AuthController::class,'user_logout'])->name('home.logout');

    Route::get('/', [WelcomController::class,'index'])->name('welcome.index');

    Route::get('count_call_phone/{promoted_dealer}', [WelcomController::class,'count_call_phone'])->name('count_call_phone');
    Route::get('count_call_email/{promoted_dealer}', [WelcomController::class,'count_call_email'])->name('count_call_email');
    Route::post('newsletter', [WelcomController::class,'newsletter'])->name('newsletter');

    //header contact
    Route::get('contact', [HeaderController::class,'contact'])->name('home.contact');
    Route::post('contact', [HeaderController::class,'contactStore'])->name('home.contact.store');

    //header suppliers route
    Route::get('searchs', [HeaderController::class,'searchs'])->name('searchs');
    Route::get('suppliers', [HeaderController::class,'supplier'])->name('home.supplier');
    Route::get('product/{product}', [HeaderController::class,'show_product'])->name('product.show');
    Route::get('category/{id}', [HeaderController::class,'show_category'])->name('category.show');
    Route::get('gallerys', [HeaderController::class,'gallerys'])->name('gallerys.index');
    Route::get('videos', [HeaderController::class,'videos'])->name('videos.index');
    Route::get('blogs', [HeaderController::class,'blogs'])->name('blogs.index');
    Route::get('blogs_details/{blog}', [HeaderController::class,'blogsShow'])->name('blogs.show');
    Route::post('commints', [HeaderController::class,'CommintStore'])->name('commints.store');
    Route::get('files', [HeaderController::class,'files'])->name('files.index');
    Route::get('common_questions', [HeaderController::class,'common_questions'])->name('common_questions.index');
    Route::get('shops', [HeaderController::class,'shops'])->name('shops.index');
    Route::get('request_custmers', [HeaderController::class,'request_custmers'])->name('request_custmers.index');
    Route::get('request_custmers/create', [HeaderController::class,'RequestCustmersCreate'])->name('request_custmers.create')->middleware('auth');
    Route::post('request_custmers/store', [HeaderController::class,'RequestCustmersStore'])->name('request_custmers.store')->middleware('auth');
    Route::get('offers_client', [HeaderController::class,'offers'])->name('offers.clients.index');
    Route::get('offers_client/show/{id}', [HeaderController::class,'offersShow'])->name('offers.clients.show');

    Route::get('manager_word', [FooterController::class,'ManagerWord'])->name('manager_word.index');
    Route::get('copyrights', [FooterController::class,'copyrights'])->name('copyrights.index');
    Route::get('privacys', [FooterController::class,'privacys'])->name('privacys.index');
    Route::get('terms_conditions', [FooterController::class,'terms_conditions'])->name('terms_conditions.index');
    Route::get('evacuation_responsibilatys', [FooterController::class,'evacuation_responsibilatys'])->name('evacuation_responsibilatys.index');
    Route::get('about', [FooterController::class,'about'])->name('about.index');
    //cart route
    // Route::get('add_cart', [CartController::class,'add_cart'])->name('add.cart');
    Route::post('add_cart', [CartController::class, 'add_cart'])->name('cart.add');
    Route::post('update_cart', [CartController::class, 'update_cart'])->name('cart.update');
    Route::delete('/destroy_cart/{id}', [CartController::class, 'destroy_cart'])->name('cart.destroy');


    Route::middleware(['auth'])->group(function () {
        //profile routes
        Route::get('/my_acount', [ProfileController::class,'index'])->name('profile.index');
        Route::post('/my_acount/store', [ProfileController::class,'update'])->name('profile.update');
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
        Route::get('sub_category/{id}', [ProductController::class, 'sub_categoreys'])->name('home.sub_categorys');

        // offers route
        Route::resource('offers', OfferController::class);

        // Route::resource('users', UserController::class)->except(['show']);

        //categoreys routes
        // Route::resource('categoreys', CategoreyController::class)->except(['show']);

    }); //end of dashboard routesz

    // Auth::routes(['register'=> false,'login'=> false]);

});//LaravelLocalization