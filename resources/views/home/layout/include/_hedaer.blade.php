  <div class="backdrop"></div>
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        <p>مرحبا بك في موقع مزارع السودان !</p>
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
                                <a href="{{ route('home.login') }}">دخول</a>
                            </div>
                            <div class="header-select"><i class="icofont-plus" style="font-size: 14px;"></i>
                                <a href="{{ route('home.register') }}">تسجيل</a>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <ul class="header-top-list">
                        <li><a href="offer.html">العروض</a></li>
                        <li><a href="faq.html">مساعدة</a></li>
                        <li><a href="{{ route('home.contact') }}">تواصل معنا</a></li>
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
                        @endauth
                    </button>
                    <a href="index.html">
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

                <form class="header-form">
                    <input type="text" placeholder="إبحث هنا ..."><button><i class="fas fa-search"></i></button>
                </form>

                <div class="header-widget-group">

                    <a href="#" class="header-widget"><i class="icofont-facebook"></i></a>

                    <a href="#" class="header-widget"><i class="icofont-twitter"></i></a>

                    <a href="#" class="header-widget"><i class="icofont-instagram"></i></a>

                    <a href="#" class="header-widget"><i class="icofont-pinterest"></i></a>

                    <button class="header-widget header-cart" title="السلة"><i class="fas fa-shopping-basket"></i><sup>9+</sup></button>
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
                                <a class="navbar-link" href="/">الرئيسية</a>
                            </li>
                            <li class="navbar-item dropdown-megamenu"><a class="navbar-link dropdown-arrow" href="#">المنتجات</a>
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
                            <li class="navbar-item"><a class="navbar-link" href="{{ route('home.supplier') }}">الموردون</a>
                            </li>
                            <li class="navbar-item"><a class="navbar-link" href="orders.html">التجار والسمتهلكين</a></li>
                            <li class="navbar-item dropdown"><a class="navbar-link dropdown-arrow" href="javascript:void(0);">المركز الإعلامي</a>
                                <ul class="dropdown-position-list">
                                    <li><a href="gallery.html">مكتبة الصور</a></li>
                                    <li><a href="videos.html">معرض الأفلام</a></li>
                                    <li><a href="blogs.html">المطبوعات</a></li>
                                    <li><a href="downloads.html">المزيد</a></li>
                                </ul>
                            </li>
                            <li class="navbar-item"><a class="navbar-link" href="{{ route('home.contact') }}">إتصل بنا</a>
                            </li>
                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                                <p><small>إتصل بنا</small><span>313 4444 12 (249+)</span></p>
                            </div>
                            <div class="navbar-info"><i class="icofont-ui-email"></i>
                                <p><small>البريد الإلكتروني</small><span>info@sudanfarms.com</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside class="category-sidebar">
        <div class="category-header">
            <h4 class="category-title"><i class="fas fa-align-right"></i><span>الأقسام</span></h4><button class="category-close"><i class="icofont-close"></i></button>
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
            <div class="cart-total"><i class="fas fa-shopping-basket"></i><span>جميع العناصر (5)</span></div><button class="cart-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list">
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/01.jpg" alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button></div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="#">فلفل طازج</a></h6>
                        <p>سعر الوحدة - SDG 87.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                        <h6>SDG 87.75</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/02.jpg" alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button></div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="#">جزر</a></h6>
                        <p>سعر الوحدة - SDG 87.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                        <h6>SDG 87.75</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/03.jpg" alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button></div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="#">كوسة طازجة</a></h6>
                        <p>سعر الوحدة - SDG 87.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                        <h6>SDG 87.75</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/04.jpg" alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button></div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="#">باذنجان</a></h6>
                        <p>سعر الوحدة - SDG 87.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                        <h6>SDG 87.75</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/05.jpg" alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button></div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="#">بامية</a></h6>
                        <p>سعر الوحدة - SDG 87.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                        <h6>SDG 87.75</h6>
                    </div>
                </div>
            </li>
        </ul>
        <div class="cart-footer">
            <form class="coupon-form"><input type="text" placeholder="Enter your coupon code"><button type="submit"><span>apply</span></button></form><a class="cart-checkout-btn" href="#"><span class="checkout-label">المبلغ الكلي</span><span class="checkout-price"> 36.78</span></a>
        </div>
    </aside>

    <aside class="nav-sidebar">
        <div class="nav-header"><a href="#"><img src="{{ asset('home_files/image/logo.svg') }}" alt="logo"></a><button class="nav-close"><i class="icofont-close"></i></button></div>
        <div class="nav-content">
            <div class="nav-btn"><a href="{{ route('home.register') }}" class="btn btn-inline"><i class="fa fa-unlock-alt"></i><span>إنضم الآن</span></a></div>
            <div class="nav-select-group">
                <div class="nav-select"><i class="icofont-login"></i>
                    <a href="{{ route('home.login') }}">دخول</a>
                </div>
                <div class="nav-select">
                    <i class="icofont-plus" style="font-size: 12px;"></i><a href="{{ route('home.register') }}">تسجيل</a>
                </div>
            </div>
            <ul class="nav-list">
                <li><a class="nav-link" href="/"><i class="icofont-home"></i><span>الرئيسية</span></a>
                </li>
                <li><a class="nav-link" href="categories.html"><i class="icofont-food-cart"></i><span>تسوق</span></a>
                </li>
                <li><a class="nav-link" href="categories.html"><i class="icofont-page"></i><span>المنتجات</span></a>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-lock"></i><span>الآمان</span></a>
                    <ul class="dropdown-list">
                        <li><a href="reset-password.html">إستعاده كلمة المرور</a></li>
                        <li><a href="change-password.html">تغيير كلمة المرور</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i><span>العروض</span></a></li>
                <li><a class="nav-link" href="profile.html"><i class="icofont-user-alt-3"></i><span>الملف الشخصي</span></a></li>
                <li><a class="nav-link" href="faq.html"><i class="icofont-question-circle"></i><span>مساعدة</span></a></li>
                <li><a class="nav-link" href="{{ route('home.contact') }}"><i class="icofont-contacts"></i><span>تواصل معنا</span></a></li>
                <li><a class="nav-link" href="#"><i class="icofont-logout"></i><span>تسجيل خروج</span></a></li>
            </ul>
            <div class="nav-info-group">
                <div class="nav-info"><i class="icofont-ui-touch-phone"></i>
                    <p><small>إتصل بنا</small><span>313 4444 12 (249+)</span></p>
                </div>
                <div class="nav-info"><i class="icofont-ui-email"></i>
                    <p><small>راسلنا</small><span>info@sudanfarms.com</span></p>
                </div>
            </div>
            <div class="nav-footer">
                <p>الحقوق محفوظة لـ <a href="#">مزارع السودان</a></p>
            </div>
        </div>
    </aside>
    <menu class="mobile-menu">
        <a href="/" title="Home Page">
            <i class="fas fa-home"></i><span>الرئيسية</span>
        </a>
        <button class="cate-btn" title="الأقسام"><i class="fas fa-list"></i><span>الأقسام</span></button>
        <a href="{{ route('home.supplier') }}" title="لموردون"><i class="fas fa-users"></i><span>الموردون</span></a>
        <a href="categories.html" title="تسوق"><i class="fas fa-shopping-basket"></i>
            <span>تسوق</span>
        </a>
        <a href="{{ route('home.contact') }}" title="إتصل بنا">
            <i class="fas fa-phone"></i><span>إتصل بنا</span>
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
                                        <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                        <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                        <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                        <li><a href="#" class="icofont-pinterest" title="Pintrest"></a></li>
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