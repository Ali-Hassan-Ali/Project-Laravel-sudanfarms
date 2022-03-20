{{-- <div class="backdrop"></div> --}}

    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        @if (app()->getLocale() == 'ar')
                            
                            <p>{{ setting('welcome_ar') }}</p>

                        @else

                            <p>{{ setting('welcom_en') }}</p>

                        @endif

                    </div>
                </div>
                <div class="col-md-5 col-lg-3">
                    <div class="header-top-select">
                        @auth
                            <div class="header-select"><i class="icofont-login"></i>
                                <a href="{{ route('home.login') }}"
                                onclick="event.preventDefault();document.getElementById('logout-user-form').submit();">
                                @lang('dashboard.logout')</a>
                            </div>
                            <form action="{{ route('home.logout') }}" method="post" id="logout-user-form" style="display: none;">
                                @csrf

                            </form>
                        @else
                            <div class="header-select"><i class="icofont-login"></i>
                                <a href="{{ route('home.login') }}">@lang('dashboard.login')</a>
                            </div>
                            <div class="header-select"><i class="icofont-plus" style="font-size: 14px;"></i>
                                <a href="{{ route('home.register') }}">@lang('dashboard.register')</a>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <ul class="header-top-list">
                        <li><a href="{{ route('offers.clients.index') }}">@lang('dashboard.offers')</a></li>
                        <li><a href="{{ route('common_questions.index') }}">@lang('dashboard.common_questions')</a></li>
                        <li><a href="{{ route('home.contact') }}">@lang('dashboard.contacts')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="header-part">
        <div class="container">
            <div class="header-content">

                <div class="header-media-group">
                    <button class="header-user">
                        @auth
                            <img src="{{ auth()->user()->image_path }}" alt="user">
                        @else
                            <img src="{{ asset('home_files/image/menn.png') }}" alt="user">
                        @endauth
                    </button>
                    <a href="{{ route('welcome.index') }}">
                        <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                    </a>
                    <button class="header-src">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <a href="{{ route('welcome.index') }}" class="header-logo" style="width: 1200px;">
                    <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                </a>

                @auth
                    <a href="{{ route('profile.index') }}" class="header-widget" title="حسابي">
                        <img src="{{ auth()->user()->image_path }}" alt="user">
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                @endauth

                <form class="header-form" action="{{ route('searchs') }}" method="get">
                    <input type="text" name="search" value="{{ request()->search }}" placeholder="@lang('dashboard.search')">
                    <button><i class="fas fa-search"></i></button>
                </form>

                <div class="header-widget-group">

                    <a href="{{ setting('facebook') }}" target="_blank" class="header-widget"><i class="icofont-facebook"></i></a>

                    <a href="{{ setting('twitter') }}" target="_blank" class="header-widget"><i class="icofont-twitter"></i></a>

                    <a href="{{ setting('instagram') }}" target="_blank" class="header-widget"><i class="icofont-instagram"></i></a>
                    <a href="{{ setting('instagram') }}" target="_blank" class="header-widget"><i class="icofont-instagram"></i></a>

                    <a href="{{ setting('whatsapp') }}" target="_blank" class="header-widget">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    @php
                        $notys = App\Models\NotificationUser::where('user_id',auth()->id())->latest()->limit(10)->get();
                    @endphp
                    <button class="header-widget header-cart-noty" title="@lang('home.cart')">
                        <i class="fas fa-bell"></i><sup class="notys-count">{{ $notys->count() }}</sup>
                    </button>

                    <button class="header-widget header-cart" title="@lang('home.cart')">
                        <i class="fas fa-shopping-basket"></i><sup class="cart-count">{{ Cart::count() }}</sup>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item">
                                <a class="navbar-link" href="{{ route('welcome.index') }}">@lang('dashboard.home')</a>
                            </li>
                            <li class="navbar-item dropdown-megamenu"><a class="navbar-link dropdown-arrow" href="#">@lang('dashboard.products')</a>
                                <div class="megamenu">
                                    <div class="container">
                                        <div class="row row-cols-5">

                                            @foreach (App\Models\Categorey::where('sub_categoreys','0')->get() as $category)

                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">{{ $category->name }}</h5>
                                                        <ul class="megamenu-list">
                                                            @foreach (App\Models\Categorey::where('sub_categoreys',$category->id)->get() as $sub_category)
                                                                
                                                                <li><a href="{{ route('category.show',$sub_category->id) }}">{{ $sub_category->name }}</a></li>

                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" href="{{ route('home.supplier') }}">@lang('dashboard.suppliers')</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" href="{{ route('request_custmers.index') }}">
                                @lang('dashboard.request_custmers')</a>
                            </li>
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown-arrow" href="javascript:void(0);">
                                    @lang('home.social_center')
                                </a>
                                <ul class="dropdown-position-list">
                                    <li><a href="{{ route('price_tables.index') }}">@lang('dashboard.price_tables')</a></li>
                                    <li><a href="{{ route('gobs.index') }}">@lang('dashboard.gobs')</a></li>
                                    <li><a href="{{ route('gallerys.index') }}">@lang('dashboard.gallerys')</a></li>
                                    <li><a href="{{ route('videos.index') }}">@lang('dashboard.videos')</a></li>
                                    <li><a href="{{ route('blogs.index') }}">@lang('dashboard.blogs')</a></li>
                                    <li><a href="{{ route('files.index') }}">@lang('dashboard.files')</a></li>
                                </ul>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" href="{{ route('home.contact') }}">@lang('dashboard.contacts')</a>
                            </li>

                            <li class="navbar-item">
                                <a class="navbar-link" hreflang="{{ app()->getLocale() == 'ar' ? 'en' : 'ar' }}" 
                                    href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar', null, [], true) }}">
                                    @if (app()->getLocale() == 'ar')

                                        <span class="d-flex align-items-start">
                                            @lang('dashboard.englsih') 
                                            <img width="50" class="mx-1" style="width: 30px; margin-top: 7px" src="{{ asset('home_files/image/lang/en.png') }}">
                                        </span>
                                        
                                    @else

                                        <span class="d-flex align-items-start">
                                            @lang('dashboard.arbic') 
                                            <img width="50" class="mx-1" src="{{ asset('home_files/image/lang/ar.png') }}">
                                        </span>

                                    @endif
                                </a>
                            </li>

                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                                <p><small>@lang('dashboard.phone')</small>
                                    <span><a href="tel:{{ setting('phone') }}" class="text-dark">{{ setting('phone') }}</a></span>
                                </p>
                            </div>
                            <div class="navbar-info"><i class="icofont-ui-email"></i>
                                <p><small>@lang('dashboard.email')</small>
                                    <span><a href="mailto:{{ setting('email') }}" class="text-dark">{{ setting('email') }}</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside class="category-sidebar">
        <div class="category-header">
            <h4 class="category-title">
                <i class="fas fa-align-right"></i>
                <span>@lang('dashboard.categorey')</span>
            </h4>
            <button class="category-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="category-list">

            @foreach (App\Models\Categorey::where('sub_categoreys','0')->get() as $category)

                <li class="category-item">
                    <a class="category-link dropdown-link" href="javascript:void(0);"><i class="flaticon-vegetable"></i>
                        <span>{{ $category->name }}</span>
                    </a>
                    <ul class="dropdown-list">
                        @foreach (App\Models\Categorey::where('sub_categoreys',$category->id)->get() as $sub_category)

                            <li><a href="{{ route('category.show',$sub_category->id) }}">{{ $sub_category->name }}</a></li>

                        @endforeach
                    </ul>
                </li>

            @endforeach

        </ul>
    </aside>

    <aside class="cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-shopping-basket"></i>
                <span class="all-product"> @lang('home.all_product') 
                    <div class="cart-count">{{ Cart::count() }}</div>
                </span>
            </div>
            <button class="cart-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list" id="add-cart-product">


            @if (Cart::count() > 0)
                
                @foreach (Cart::content() as $product)

                    <li class="cart-item cart-item-{{ $product->id }}">
                        <div class="cart-media">
                            @php
                                        
                                $image_product = App\Models\ImageProduct::where('product_id',$product->id)->first();

                            @endphp
                            <a href="{{ route('product.show',$product->id) }}">
                                <img src="{{ $image_product->image_path }}" alt="product">
                            </a>
                            <button class="cart-delete-{{ $product->id }} removal-product" 
                                    data-id="{{ $product->id }}" data-rowId="{{ $product->rowId }}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></h6>
                                <p class="product-price-{{ $product->id }}">
                                    {{ $product->model->quantity_guard }} - {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }} 

                                    {{ $product->model->new_price }}    
                                </p>
                            </div>
                            <div class="cart-action-group">
                                <div class="product-action">
                                    <button class="product-quntty-down"
                                        data-id="{{ $product->id }}" data-rowId="{{ $product->rowId }}">
                                        <i class="icofont-minus"></i>
                                    </button>
                                    <input class="action-input product-quntty-{{ $product->id }}" 
                                            title="Quantity Number" type="text" name="quantity" value="{{ $product->qty }}">
                                    <button class="product-quntty-up" 
                                        data-id="{{ $product->id }}" data-rowId="{{ $product->rowId }}">
                                        <i class="icofont-plus"></i>
                                    </button>
                                </div>
                                <h6>
                                    <p class="new-price product-sub-totle-{{ $product->id }}">
                                        {{ app()->getLocale() == 'ar' ? 'س' : 'SDG' }} 
                                        {{ number_format($product->qty * preg_replace('/,/', '', $product->model->new_price),2) }}
                                    </p>
                                </h6>
                            </div>
                        </div>
                    </li>
                    
                @endforeach

            @else

                <h2 class="no-data">@lang('dashboard.no_data_found')</h2>

            @endif
        </ul>
        <div id="cart-update" hidden>
            {{ route('cart.update') }}
        </div>
        <div id="cart-destroy" hidden>
            {{ route('cart.destroy') }}
        </div>
        <div class="cart-footer">
            @auth
                
                <a class="cart-checkout-btn btn-send" href="{{ route('cart.send') }}">
                    <span class="checkout-label">@lang('home.send')</span>
                    <span class="checkout-price cart-totle">
                        {{ app()->getLocale() == 'ar' ? 'س' : 'SDG' }} {{ Cart::subtotal() }}
                    </span>
                </a>

            @else

                <a class="cart-checkout-btn btn-send" href="{{ route('home.login') }}">
                    <span class="checkout-label">@lang('home.login')</span>
                    <span class="checkout-price cart-totle">
                        {{ app()->getLocale() == 'ar' ? 'س' : 'SDG' }} {{ Cart::subtotal() }}
                    </span>
                </a>

            @endauth
        </div>
    </aside>


    <aside class="cart-sidebar-noty cart-sidebar-noty">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-bell"></i>
                <span class="all-product"> @lang('dashboard.count_noty') 
                    <div class="notys-count">{{ $notys->count() }}</div>
                </span>
            </div>
            <button class="cart-close-noty"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list" id="add-cart-product">

            @if ($notys->count() > 0)
                
                @foreach ($notys as $noty)

                    <li class="cart-item">
                        
                        <div class="cart-info-group">
                            <div class="cart-info text-center">

                                <h6><a href="#">{{ $noty->title }}</a></h6>
                                <p class="product-price">
                                    {{-- {{ $product->model->quantity_guard }} - {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }}  --}}

                                    {{-- {{ $product->price_decount - $product->price }}     --}}
                                </p>
                            </div>
                        </div>
                    </li>
                    
                @endforeach

            @else

                <h2 class="no-data">@lang('dashboard.no_data_found')</h2>

            @endif
        </ul>
    </aside>

    <aside class="nav-sidebar">
        <div class="nav-header">
            <a href="#"><img src="{{ asset('home_files/image/logo.svg') }}" alt="logo"></a>
            <button class="nav-close"><i class="icofont-close"></i></button>
        </div>
        <div class="nav-content">
            @auth
                
            @else

                <div class="nav-btn">
                    <a href="{{ route('home.register') }}" class="btn btn-inline">
                        <i class="fa fa-unlock-alt"></i><span>@lang('dashboard.register')</span>
                    </a>
                </div>

            @endauth
            <div class="nav-select-group">
                @auth

                <div class="nav-header">
                    <a href="#"><img src="{{ auth()->user()->image_path }}" alt="logo"></a>
                </div>
                    
                @else

                    <div class="nav-select"><i class="icofont-login"></i>
                        <a href="{{ route('home.login') }}">@lang('dashboard.login')</a>
                    </div>
                    <div class="nav-select">
                        <i class="icofont-plus" style="font-size: 12px;"></i><a href="{{ route('home.register') }}">@lang('dashboard.register')</a>
                    </div>

                @endauth
            </div>
            <ul class="nav-list">

                @auth
                    <li>
                        <a class="nav-link dropdown-link" href="#">
                            <i class="icofont-lock"></i><span>@lang('home.safety')</span>
                        </a>
                        <ul class="dropdown-list">
                            <li><a href="{{ route('change_password.index') }}">@lang('home.change_password')</a></li>
                        </ul>
                    </li>
                @endauth

                <li>
                    <a class="nav-link" href="{{ route('welcome.index') }}">
                        <i class="icofont-home"></i><span>@lang('dashboard.home')</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('home.supplier') }}">
                        <i class="icofont-home"></i><span>@lang('dashboard.suppliers')</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('request_custmers.index') }}">
                        <i class="icofont-home"></i><span>@lang('dashboard.request_custmers')</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link dropdown-link" href="#">
                        <i class="icofont-lock"></i><span>@lang('home.social_center')</span>
                    </a>
                    <ul class="dropdown-list">
                        <li>
                            <a href="{{ route('price_tables.index') }}">
                                @lang('dashboard.price_tables')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gobs.index') }}">
                                @lang('dashboard.gobs')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallerys.index') }}">
                                @lang('dashboard.gallerys')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('videos.index') }}">
                                @lang('dashboard.videos')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index') }}">
                                @lang('dashboard.blogs')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('files.index') }}">
                                @lang('dashboard.files')
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a class="nav-link" hreflang="{{ app()->getLocale() == 'ar' ? 'en' : 'ar' }}" 
                        href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar', null, [], true) }}">
                        @if (app()->getLocale() == 'ar')

                            <i class="icofont-food-cart"></i>
                            <span class="d-flex align-items-start">
                                @lang('dashboard.englsih') 
                                <img width="50" class="mx-1" style="width: 30px; margin-top: 7px" src="{{ asset('home_files/image/lang/en.png') }}">
                            </span>
                            
                        @else
                            <i class="icofont-food-cart"></i>
                            <span class="d-flex align-items-start">
                                @lang('dashboard.arbic') 
                                <img width="50" class="mx-1" src="{{ asset('home_files/image/lang/ar.png') }}">
                            </span>

                        @endif
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('home.contact') }}">
                        <i class="icofont-food-cart"></i><span>@lang('dashboard.contact')</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('shops.index') }}">
                        <i class="icofont-food-cart"></i><span>@lang('home.shops')</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('offers.clients.index') }}">
                        <i class="icofont-sale-discount"></i>
                        <span>@lang('dashboard.offers')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <i class="icofont-user-alt-3"></i><span>@lang('home.profile')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('common_questions.index') }}">
                        <i class="icofont-question-circle"></i><span>@lang('dashboard.common_questions')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('home.contact') }}">
                        <i class="icofont-contacts"></i><span>@lang('dashboard.contacts')</span>
                    </a>
                </li>
                
                @auth

                    <li>
                        <a class="nav-link" onclick="event.preventDefault();document.getElementById('logout-user-form').submit();" href="#">
                        <i class="icofont-logout"></i><span>@lang('dashboard.logout')</span></a>
                    </li>
                    
                @endauth
            </ul>
            <div class="nav-info-group">
                <div class="nav-info"><i class="icofont-ui-touch-phone"></i>
                    <p><small>@lang('dashboard.phone')</small><span>{{ setting('phone') }}</span></p>
                </div>
                <div class="nav-info"><i class="icofont-ui-email"></i>
                    <p><small>@lang('dashboard.email')</small><span>{{ setting('email') }}</span></p>
                </div>
            </div>
            {{-- <div class="nav-footer">
                <p>الحقوق محفوظة لـ <a href="#">مزارع السودان</a></p>
            </div> --}}
        </div>
    </aside>
    <menu class="mobile-menu">
        <a href="{{ route('welcome.index') }}" title="Home Page">
            <i class="fas fa-home"></i><span>@lang('dashboard.home_page')</span>
        </a>
        <button class="cate-btn" id="category-model" title="@lang('dashboard.categorey')">
            <i class="fas fa-list"></i>
            <span>@lang('dashboard.categorey')</span>
        </button>
        <a href="{{ route('home.supplier') }}" title="@lang('dashboard.suppliers')">
            <i class="fas fa-users"></i>
            <span>@lang('dashboard.suppliers')</span>
        </a>
        <a href="{{ route('home.contact') }}" title="@lang('dashboard.contacts')">
            <i class="fas fa-phone"></i><span> @lang('dashboard.contacts')</span>
        </a>
        <button class="header-widget header-cart-noty" title="@lang('dashboard.notifications')">
            <i class="fas fa-bell"></i>
            <sup class="notys-count">{{ $notys->count() }}</sup>
        </button>
        <button class="header-widget header-cart" title="@lang('home.shops')">
            <i class="fas fa-shopping-basket"></i>
            <sup class="cart-count">{{ Cart::count() }}</sup>
        </button>
    </menu>