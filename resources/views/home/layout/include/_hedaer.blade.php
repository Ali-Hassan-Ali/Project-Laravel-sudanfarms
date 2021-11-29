  <div class="backdrop"></div>
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        @if (app()->getLocale() == 'ar')
                            
                            <p>{{ setting('welcome_ar') }}</p>

                        @else

                            <p>{{ setting('welcome_en') }}</p>

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
                            <img src="{{ asset('home_files/image/logo.svg') }}" alt="user">
                        @endauth
                    </button>
                    <a href="/">
                        <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                    </a>
                    <button class="header-src">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <a href="/" class="header-logo">
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

                    <a href="{{ setting('facebook') }}" class="header-widget"><i class="icofont-facebook"></i></a>

                    <a href="{{ setting('twitter') }}" class="header-widget"><i class="icofont-twitter"></i></a>

                    <a href="{{ setting('instagram') }}" class="header-widget"><i class="icofont-instagram"></i></a>

                    <a href="{{ setting('pinterest') }}" class="header-widget"><i class="icofont-pinterest"></i></a>

                    <button class="header-widget header-cart" title="السلة"><i class="fas fa-shopping-basket"></i><sup>{{ Cart::count() }}</sup></button>
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
                                <a class="navbar-link" href="/">@lang('dashboard.home')</a>
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
                            <li class="navbar-item"><a class="navbar-link" href="{{ route('home.supplier') }}">@lang('dashboard.suppliers')</a>
                            </li>
                            <li class="navbar-item"><a class="navbar-link" href="{{ route('request_custmers.index') }}">@lang('dashboard.request_custmers')</a></li>
                            <li class="navbar-item dropdown"><a class="navbar-link dropdown-arrow" href="javascript:void(0);">@lang('home.social_center')</a>
                                <ul class="dropdown-position-list">
                                    <li><a href="{{ route('gallerys.index') }}">@lang('dashboard.gallerys')</a></li>
                                    <li><a href="{{ route('videos.index') }}">@lang('dashboard.videos')</a></li>
                                    <li><a href="{{ route('blogs.index') }}">@lang('dashboard.blogs')</a></li>
                                    <li><a href="{{ route('files.index') }}">@lang('dashboard.files')</a></li>
                                </ul>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" href="{{ route('home.contact') }}">@lang('dashboard.contacts')</a>
                            </li>

                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown-arrow" href="javascript:void(0);">
                                    @lang('home.language')
                                </a>
                                <ul class="dropdown-position-list">
                                    
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    
                                    <li>
                                        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>

                                    @endforeach

                                </ul>
                            </li>

                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                                <p><small>@lang('dashboard.phone')</small><span>{{ setting('phone') }}</span></p>
                            </div>
                            <div class="navbar-info"><i class="icofont-ui-email"></i>
                                <p><small>@lang('dashboard.email')</small><span>{{ setting('email') }}</span></p>
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
        <div class="category-footer">
            <p>الحقوق محفوظة لـ <a href="#">مزارع السودان</a></p>
        </div>
    </aside>
    <aside class="cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-shopping-basket"></i>
                <span class="all-product"> @lang('home.all_product') ({{ Cart::count() }})</span>
            </div>
            <button class="cart-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list" id="add-cart-product">
            @if (Cart::count() > '1')
                
                @foreach (Cart::content() as $product)

                    <li class="cart-item">
                        <div class="cart-media">
                            @php
                                        
                                $image_product = App\Models\ImageProduct::where('product_id',$product->id)->first();

                            @endphp
                            <a href="{{ route('product.show',$product->id) }}">
                                <img src="{{ $image_product->image_path }}" alt="product">
                            </a>
                            <button class="cart-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></h6>
                                <p>{{ $product->quantity_guard }} - {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }} {{ $product->price_decount - $product->price }}</p>
                            </div>
                            <div class="cart-action-group">
                                <div class="product-action">
                                    <button class="action-minus add-cart" data-id="{{ $product->id }}" title="نقصان الكيمة">
                                        <i class="icofont-minus"></i>
                                    </button>
                                    <input class="action-input product-qty-{{ $product->id }}" id="add-cart-product-{{ $product->id }}" title="Quantity Number" type="text" name="quantity" value="{{ $product->qty }}">
                                    <button class="action-plus add-cart" data-id="{{ $product->id }}" title="زيادة الكمية">
                                        <i class="icofont-plus"></i>
                                    </button>
                                </div>
                                <h6>{{ app()->getLocale() == 'ar' ? 'س' : 'SDG' }} 
                                    <p class="new-price">{{ $product->price_decount - $product->price }}</p>
                                </h6>
                            </div>
                        </div>
                    </li>
                    
                @endforeach

            @else

                <h2 class="no-data">@lang('dashboard.no_data_found')</h2>

            @endif
        </ul>
        <div class="cart-footer">
            <form class="coupon-form">
                <input type="text" placeholder="Enter your coupon code">
                <button type="submit"><span>apply</span></button>
            </form>
            <a class="cart-checkout-btn" href="#">
                <span class="checkout-label">@lang('home.totle_price')</span>
                <span class="checkout-price cart-totle">{{ app()->getLocale() == 'ar' ? 'س' : 'SDG' }} {{ Cart::subtotal() }}</span>
            </a>
        </div>
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
                <li>
                    <a class="nav-link dropdown-link" href="#">
                        <i class="icofont-lock"></i><span>@lang('home.language')</span>
                    </a>
                    <ul class="dropdown-list">
                        
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        
                        <li>
                            <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>

                        @endforeach

                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="/">
                        <i class="icofont-home"></i><span>@lang('dashboard.home')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('shops.index') }}">
                        <i class="icofont-food-cart"></i><span>@lang('home.shops')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" onclick="event.preventDefault();document.getElementById('category-model').click();">
                        <i class="icofont-page"></i><span>@lang('dashboard.products')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link dropdown-link" href="#">
                        <i class="icofont-lock"></i><span>الآمان</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="reset-password.html">إستعاده كلمة المرور</a></li>
                        <li><a href="change-password.html">تغيير كلمة المرور</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('offers.clients.index') }}">
                        <i class="icofont-sale-discount"></i>
                        <span>@lang('dashboard.offers')</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <i class="icofont-user-alt-3"></i><span>الملف الشخصي</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('common_questions.index') }}">
                        <i class="icofont-question-circle"></i><span>مساعدة</span>
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
            <div class="nav-footer">
                <p>الحقوق محفوظة لـ <a href="#">مزارع السودان</a></p>
            </div>
        </div>
    </aside>
    <menu class="mobile-menu">
        <a href="/" title="Home Page">
            <i class="fas fa-home"></i><span>@lang('dashboard.home')</span>
        </a>
        <button class="cate-btn" id="category-model" title="@lang('dashboard.categorey')">
            <i class="fas fa-list"></i>
            <span>@lang('dashboard.categorey')</span>
        </button>
        <a href="{{ route('home.supplier') }}" title="@lang('dashboard.suppliers')">
            <i class="fas fa-users"></i>
            <span>@lang('dashboard.suppliers')</span>
        </a>
        <button class="header-widget header-cart" title="@lang('home.shops')">
            <i class="fas fa-shopping-basket"></i>
            {{-- <span> @lang('home.shops')</span> --}}
            <sup>{{ Cart::count() }}</sup>
        </button>
        <a href="{{ route('home.contact') }}" title="@lang('dashboard.contacts')">
            <i class="fas fa-phone"></i><span> @lang('dashboard.contacts')</span>
        </a>
    </menu>


    <div class="modal fade" id="product-view">
        <div class="modal-dialog">
            <div class="modal-content"><button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="view-gallery">
                                <div class="view-label-group"><label class="view-label new">جديد</label><label class="view-label off">-10%</label></div>
                                <ul class="preview-slider slider-arrow">
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                </ul>
                                <ul class="thumb-slider">
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="view-details">
                                <h3 class="view-name"><a href="#">فلفل طازج</a></h3>
                                <div class="view-meta">
                                    <p>الشركة :</p>
                                    <p>شركة حلا الدولية</p>
                                </div>
                                <div class="view-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3 تقيمات)</a></div>
                                <h3 class="view-price"><del>SDG38.00</del><span>SDG24.00<small> /الكيلو</small></span></h3>
                                <p class="view-desc">هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.
                                    بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.</p>
                                <div class="view-list-group"><label class="view-list-title">منتجات مماثلة:</label>
                                    <ul class="view-tag-list">
                                        <li><a href="#">فلفل أخضر</a></li>
                                        <li><a href="#">خضروات</a></li>
                                        <li><a href="#">فلفل حار</a></li>
                                    </ul>
                                </div>
                                <div class="view-list-group"><label class="view-list-title">مشاركة:</label>
                                    <ul class="view-share-list">
                                        <li><a href="{{ setting('facebook') }}" class="icofont-facebook" title="Facebook"></a></li>
                                        <li><a href="{{ setting('twitter') }}" class="icofont-twitter" title="Twitter"></a></li>
                                        <li><a href="{{ setting('instagram') }}" class="icofont-instagram" title="Instagram"></a></li>
                                        <li><a href="{{ setting('pinterest') }}" class="icofont-pinterest" title="Pintrest"></a></li>
                                    </ul>
                                </div>
                                <div class="view-add-group"><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                    <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                                </div>
                                <div class="view-action-group"><a class="view-wish wish" href="#" title="Add Your Wishlist"><i class="icofont-heart"></i><span>المزيد الى المفضلة</span></a><a class="view-compare" href="#" title="Compare This Item"><i class="fas fa-random"></i><span>قارن هذا</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>