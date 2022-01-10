<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\WelcomController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\CategoreyController;
use App\Http\Controllers\Dashboard\SubCategoreyController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryDealerController;
use App\Http\Controllers\Dashboard\PromotedDealerController;
use App\Http\Controllers\Dashboard\ClientsController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\OffersController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\CurrenccyController;
use App\Http\Controllers\Dashboard\PriceTableController;

//Setting Controller
use App\Http\Controllers\Dashboard\Setting\SettingBannerController;
use App\Http\Controllers\Dashboard\Setting\SettingController;
use App\Http\Controllers\Dashboard\Setting\GalleryCategoryController;
use App\Http\Controllers\Dashboard\Setting\GalleryController;
use App\Http\Controllers\Dashboard\Setting\VideoCategoryController;
use App\Http\Controllers\Dashboard\Setting\VideoControlle;
use App\Http\Controllers\Dashboard\Setting\BlogController;
use App\Http\Controllers\Dashboard\Setting\FileController;
use App\Http\Controllers\Dashboard\Setting\CommonQuestionController;
use App\Http\Controllers\Dashboard\Setting\NewsletterController;
use App\Http\Controllers\Dashboard\Setting\PolicyController;
use App\Http\Controllers\Dashboard\Setting\AdvertisementController;
use App\Http\Controllers\Dashboard\Setting\AboutCustomerController;



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], 

function () {

    Route::get('/dashboard/login', [LoginController::class,'index'])->name('dashboard.login.index');
    Route::post('/dashboard/login', [LoginController::class,'store'])->name('dashboard.login.store');
    Route::post('/dashboard/logout', [LoginController::class,'seller_logout'])->name('dashboard.logout');

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', [WelcomController::class,'index'])->name('welcome');

        Route::get('notification.show', [NotificationController::class,'show'])->name('notification.show');

        Route::get('promoted_dealer_count', [WelcomController::class,'promoted_dealer_count'])->name('promoted_dealer_count');

        // profile route
        Route::get('profile/edit', [LoginController::class,'edit'])->name('profile.edit');
        Route::put('profile/update/{user}', [LoginController::class,'update'])->name('profile.update');

        //user routes
        Route::resource('users', UserController::class)->except(['show']);

        //user routes
        Route::resource('clients', ClientsController::class)->except(['show']);

        //user routes
        Route::resource('orders', OrderController::class)->except(['create','edit','update']);

        //user routes
        Route::resource('currenccys', CurrenccyController::class)->except(['create','store','show','destroy']);

        //categoreys routes
        Route::resource('categoreys', CategoreyController::class)->except(['show']);
        Route::get('sub_category/{id}', [CategoreyController::class, 'sub_categoreys'])->name('sub_categorys');

        //sub categoreys routes
        Route::resource('sub_categoreys', SubCategoreyController::class)->except(['show']);

        //products routes
        Route::resource('products', ProductController::class);

        //category_dealers routes
        Route::resource('offers', OffersController::class)->except(['show']);

        //category_dealers routes
        Route::resource('category_dealers', CategoryDealerController::class)->except(['show']);

        //promoted_dealers routes
        Route::resource('promoted_dealers', PromotedDealerController::class);
        Route::get('promoted_dealers.status/{promoted_dealer}', [PromotedDealerController::class,'status'])->name('promoted_dealers.status');

        //newsletters routes
        Route::resource('newsletters', NewsletterController::class)->except(['show']);

        //newsletters routes
        Route::resource('packages', PackageController::class)->except(['show']);
        
        
        Route::resource('price_tables', PriceTableController::class)->except(['show']);

        
        //contacts routes
        Route::resource('contacts', ContactController::class)->except(['show','store','create','edit','update']);
        Route::get('reply_message/{contact}', [ContactController::class,'ReplyMessageIndex'])->name('reply_message.index');
        Route::put('reply_message/{contact}', [ContactController::class,'ReplyMessage'])->name('contacts.reply_message.send');


        Route::prefix('settings')->name('settings.')->group(function () {

            //policys routes
            Route::resource('policys', PolicyController::class)->except(['show','index']);

            Route::get('copyrights', [PolicyController::class,'copyrights'])->name('copyrights.index');
            Route::get('privacys', [PolicyController::class,'privacys'])->name('privacys.index');
            Route::get('terms_conditions', [PolicyController::class,'terms_conditions'])->name('terms_conditions.index');
            Route::get('evacuation_responsibilatys', [PolicyController::class,'evacuation_responsibilatys'])->name('evacuation_responsibilatys.index');

            //setting_banners routes
            Route::resource('setting_banners', SettingBannerController::class)->except(['show']);

            //setting routes gallery_categorys
            Route::resource('gallery_categorys', GalleryCategoryController::class)->except(['show']);
            Route::resource('gallerys', GalleryController::class)->except(['show']);
            Route::resource('video_categorys', VideoCategoryController::class)->except(['show']);
            Route::resource('videos', VideoControlle::class)->except(['show']);
            Route::resource('blogs', BlogController::class)->except(['show']);
            Route::resource('files', FileController::class)->except(['show']);
            Route::resource('common_questions', CommonQuestionController::class)->except(['show']);
            Route::resource('advertisements', AdvertisementController::class)->except(['create','store','show','destroy']);
            Route::resource('about_customers', AboutCustomerController::class)->except(['show']);
            //settings route
            Route::get('services', [SettingController::class,'services'])->name('services.index');
            Route::get('social_links', [SettingController::class,'social_links'])->name('social_links.index');
            Route::get('manager_word', [SettingController::class,'manager_word'])->name('manager_word.index');
            Route::get('about', [SettingController::class,'about'])->name('about.index');
            Route::post('/settings', [SettingController::class,'store'])->name('settings.store');

        }); //end of settings routes

    }); //end of dashboard routes

});//LaravelLocalization
