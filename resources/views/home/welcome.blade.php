@extends('home.layout.app')

@section('content')

@section('title', __('home.welcome'))   

    <section class="home-index-slider slider-arrow slider-dots">
        
        @foreach (App\Models\SettingBanner::all() as $index=>$data)
            
        <div class="banner-part banner-{{ $index++ }}" style="background: url({{ $data->image_path }}); width: 651px; position: relative; right: -651px; top: 0px; z-index: 998; opacity: 0; transition: opacity 600ms ease 0s;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="banner-content">
                            <h1>{{ $data->title }}</h1>
                            <p>{{ $data->description }}</p>
                            <div class="banner-btn">
                                <a class="btn btn-inline" href="categories.html">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>تسوق الآن</span>
                                </a>
                                <a class="btn btn-outline" href="offer.html">
                                    <i class="icofont-sale-discount"></i>
                                    <span>العروض</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        {{-- <div class="banner-img"><img src="{{ $data->image_path }}" alt="index"></div> --}}
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </section>

    <section class="section suggest-part">
        <div class="container">
            <ul class="suggest-slider slider-arrow">

                @foreach ($sub_categoreys as $category)
                    <li>
                        <a class="suggest-card" href="{{ route('category.show',$category->id) }}">
                        <img src="{{ $category->image_path }}" alt="suggest">
                            <h5>{{ $category->name }}<span>{{ $category->product->count() }} @lang('home.item')</span></h5>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    
    <section class="section recent-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>المنتجات المضافة حديثا</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach (\App\Models\Product::latest()->paginate(10) as $product)
                    
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">جديد</label>
                                </div>
                                <button class="product-wish wish"><i class="fas fa-heart"></i></button>
                                @php
                                    
                                    $image_product = App\Models\ImageProduct::where('product_id',$product->id)->first();

                                    $user_id = $product->user->id;

                                    $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                @endphp
                                <a class="product-image" href="{{ route('product.show',$product->id) }}">
                                    <img src="{{ $image_product->image_path }}" alt="product" style="width: 100%;">
                                </a>
                                <div class="product-widget">
                                    <a title="مقارنة المنتج" href="#" class="fas fa-random"></a>
                                    <a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                    <a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    @for ($i = 0; $i < $product->stars; $i++)
                                        <i class="active icofont-star"></i>
                                    @endfor
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <a href="#">({{ $product->stars }})</a>
                                </div>
                                <h6 class="product-name">
                                    <a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a>
                                </h6>
                                <h6 class="product-price mb-0">
                                    <span>{{ $promoted_dealer->name }}</span>
                                </h6>
                                <h6 class="product-price">
                                    <span>{{ $product->quantity }}<small>/{{ $product->quantity_guard }}</small></span>
                                </h6>
                                <button class="product-add" title="@lang('home.add_cart')">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                </button>
                                <div class="product-action">
                                    <button class="action-minus" title="نقصان الكيمة">
                                        <i class="icofont-minus"></i>
                                    </button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="#" class="btn btn-outline"><i class="fas fa-eye"></i><span>عرض المزيد</span></a></div>
                </div>
            </div>
        </div>
    </section>

    <div class="section promo-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="promo-img"><a href=""><img src="images/newsletter.jpg" alt="promo"></a>
                        <h3>مساحة إعلانية</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section feature-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>المنتجات المميزة</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                
                @foreach (\App\Models\Product::inRandomOrder()->latest()->paginate(6) as $product)
                
                    <div class="col">
                        <div class="feature-card">
                            <div class="feature-media">
                                <div class="feature-label">
                                    <label class="label-text feat">مميز</label>
                                </div>
                                <button class="feature-wish wish">
                                    <i class="fas fa-heart"></i>
                                </button>
                                @php
                                    
                                    $image_product = App\Models\ImageProduct::where('product_id',$product->id)->first();

                                    $user_id = $product->user->id;

                                    $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                @endphp
                                <a class="feature-image" href="{{ route('product.show',$product->id) }}">
                                    <img src="{{ $image_product->image_path }}" alt="product">
                                </a>
                                <div class="feature-widget">
                                    <a title="مقارنة المنتج" href="#" class="fas fa-random"></a>
                                    <a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                    <a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h6 class="feature-name"><a href="#">كوسة هجين روزينا</a></h6>
                                <div class="feature-rating">
                                    @for ($i = 0; $i < $product->stars; $i++)
                                        <i class="active icofont-star"></i>
                                    @endfor
                                    {{-- <i class="icofont-star"></i> --}}
                                    <a href="{{ route('product.show',$product->id) }}">{{ $promoted_dealer->name }}</a>
                                </div>
                                <h6 class="feature-price">
                                    <del>SDG{{ $product->price }}</del>
                                    <span>SDG{{ $product->price }}<small>/{{ $product->quantity_guard }}</small></span>
                                </h6>
                                <p class="feature-desc">{{ $product->description }}</p>
                                <button class="product-add" title="@lang('home.add_cart')">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                </button>
                                <div class="product-action">
                                    <button class="action-minus" title="نقصان الكيمة">
                                        <i class="icofont-minus"></i>
                                    </button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="زيادة الكمية">
                                        <i class="icofont-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="#" class="btn btn-outline"><i class="fas fa-eye"></i><span>عرض المزيد</span></a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section countdown-part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto">
                    <div class="countdown-content">
                        <h3>عرض تخفيض خاص للخضروات من مزارع السودان</h3>
                        <p>هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل.</p>
                        <div class="countdown countdown-clock" data-countdown="2021/12/09"><span class="countdown-time"><span>00</span><small>أيام</small></span><span class="countdown-time"><span>00</span><small>ساعات</small></span><span class="countdown-time"><span>00</span><small>دقائق</small></span><span class="countdown-time"><span>00</span><small>ثواني</small></span></div><a href="categories.html" class="btn btn-inline"><i class="fas fa-shopping-basket"></i><span>تسوق الآن</span></a>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="countdown-img"><img src="images/countdown.png" alt="countdown">
                        <div class="countdown-off"><span>20%</span><span style="font-size: 18px;">تخفيض</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section newitem-part">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-heading">
                        <h2>المنتجات الجديده</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="new-slider slider-arrow">

                        @foreach (\App\Models\Product::inRandomOrder()->latest()->paginate(10) as $product)

                        <li>
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-label"><label class="label-text new">جديد</label></div>
                                    <button class="product-wish wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    @php
                                        
                                        $image_product = App\Models\ImageProduct::where('product_id',$product->id)->first();

                                        $user_id = $product->user->id;

                                        $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                    @endphp
                                    <a class="product-image" href="{{ route('product.show',$product->id) }}">
                                        <img src="{{ $image_product->image_path }}" alt="product">
                                    </a>
                                    <div class="product-widget">
                                        <a title="مقارنة المنتج" href="#" class="fas fa-random"></a>
                                        <a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                        <a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        @for ($i = 0; $i < $product->stars; $i++)
                                            <i class="active icofont-star"></i>
                                        @endfor
                                        {{-- <i class="icofont-star"></i> --}}
                                        <a href="#">({{ $product->stars }})</a>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a>
                                    </h6>
                                    <h6 class="product-price mb-0">
                                        <del>SDG{{ $product->price }}</del>
                                        <span>SDG{{ $product->price }}<small>/{{ $product->quantity_guard }}</small></span>
                                    </h6>
                                    <h6 class="product-price"><span>{{ $promoted_dealer->name }}</span></h6>
                                    <button class="product-add" title="@lang('home.add_cart')">
                                        <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                    </button>
                                    <div class="product-action">
                                        <button class="action-minus" title="نقصان الكيمة">
                                            <i class="icofont-minus"></i>
                                        </button>
                                        <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                        <button class="action-plus" title="زيادة الكمية">
                                            <i class="icofont-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="section-btn-25"><a href="#" class="btn btn-outline"><i class="fas fa-eye"></i><span>عرض المزيد</span></a></div>
                </div>
            </div>
        </div>
    </section>

    <div class="section promo-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                    <div class="promo-img"><a href=""><img src="images/blog/01.jpg" alt="promo"></a>
                        <h3>مساحة إعلانية</h3>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                    <div class="promo-img"><a href=""><img src="images/blog/02.jpg" alt="promo"></a>
                        <h3>مساحة إعلانية</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section niche-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>تصفح حسب التخصص</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#top-order" class="tab-link active" data-bs-toggle="tab"><i class="icofont-price"></i><span>الأعلى طلبا</span></a></li>
                        <li><a href="#top-rate" class="tab-link" data-bs-toggle="tab"><i class="icofont-star"></i><span>الأعلى تقييما</span></a></li>
                        <li><a href="#top-disc" class="tab-link" data-bs-toggle="tab"><i class="icofont-sale-discount"></i><span>الأعلى تخفيضا</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane active" id="top-order">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">314</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/01.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">فلفل أخضر طازج</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/قطعة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">940</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/02.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><a href="#">(6)</a></div>
                                <h6 class="product-name"><a href="single-product.html">جزر طازج</a></h6>
                                <h6 class="product-price"><del>SDG50</del><span>SDG23<small>/كيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">425</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/03.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(5)</a></div>
                                <h6 class="product-name"><a href="single-product.html">كوسة هجين روزين</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">200</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/04.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">باذنجان</a></h6>
                                <h6 class="product-price"><del>SDG300</del><span>SDG108<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">150</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/05.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بامية</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">416</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/06.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(7)</a></div>
                                <h6 class="product-name"><a href="single-product.html">طماطم فريش</a></h6>
                                <h6 class="product-price"><del>SDG77</del><span>SDG43<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card product-disable">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">314</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/07.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بصل أحمر</a></h6>
                                <h6 class="product-price"><del>SDG100</del><span>SDG77<small>/كرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">800</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/08.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class=" icofont-star"></i><i class="icofont-star"></i><a href="#">(8)</a></div>
                                <h6 class="product-name"><a href="single-product.html">ملفوف</a></h6>
                                <h6 class="product-price"><del>SDG66</del><span>SDG60<small>/القطعة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">350</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/09.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بصل أبيض</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text order">600</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/10.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">فلفل أحمر طازج</a></h6>
                                <h6 class="product-price"><del>SDG30</del><span>SDG19<small>/القطعة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="top-rate">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">5.5</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/11.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بامية</a></h6>
                                <h6 class="product-price"><del>SDG50</del><span>SDG52<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">4.9</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/12.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(4)</a></div>
                                <h6 class="product-name"><a href="single-product.html">يقطين</a></h6>
                                <h6 class="product-price"><del>SDG44</del><span>SDG20<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">4.8</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/13.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(7)</a></div>
                                <h6 class="product-name"><a href="single-product.html">فراولة</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG14<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">4.7</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/14.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(5)</a></div>
                                <h6 class="product-name"><a href="single-product.html">تفاح أحمر</a></h6>
                                <h6 class="product-price"><del>SDG28</del><span>SDG18<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">4.8</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/15.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">لوز جديد</a></h6>
                                <h6 class="product-price"><del>SDG35</del><span>SDG12<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">4.1</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/16.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(8)</a></div>
                                <h6 class="product-name"><a href="single-product.html">برتقال</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card product-disable">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">5.5</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/17.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">عنب اخضر</a></h6>
                                <h6 class="product-price"><del>SDG100</del><span>SDG88<small>/كيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">5.5</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/18.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(6)</a></div>
                                <h6 class="product-name"><a href="single-product.html">الموز</a></h6>
                                <h6 class="product-price"><del>SDG33</del><span>SDG21<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">5.5</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/19.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(9)</a></div>
                                <h6 class="product-name"><a href="single-product.html">أناناس</a></h6>
                                <h6 class="product-price"><del>SDG30</del><span>SDG29<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text rate">5.5</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/20.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">الكرز</a></h6>
                                <h6 class="product-price"><del>SDG14</del><span>SDG11<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="top-disc">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-10%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/06.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(7)</a></div>
                                <h6 class="product-name"><a href="single-product.html">طماطم</a></h6>
                                <h6 class="product-price"><del>SDG33</del><span>SDG22<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-20%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/07.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بصل أحمر</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-30%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/08.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(8)</a></div>
                                <h6 class="product-name"><a href="single-product.html">ملفوف</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG10<small>/القطعة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-15%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/09.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><a href="#">(6)</a></div>
                                <h6 class="product-name"><a href="single-product.html">كوسة هجين</a></h6>
                                <h6 class="product-price"><del>SDG77</del><span>SDG70<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-12%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/10.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">فلفل أحمر حار</a></h6>
                                <h6 class="product-price"><del>SDG34</del><span>SDG28<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-10%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/11.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(5)</a></div>
                                <h6 class="product-name"><a href="single-product.html">بامية</a></h6>
                                <h6 class="product-price"><del>SDG14</del><span>SDG11<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-20%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/12.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><i class=" icofont-star"></i><i class="icofont-star"></i><a href="#">(9)</a></div>
                                <h6 class="product-name"><a href="single-product.html">يقطين</a></h6>
                                <h6 class="product-price"><del>SDG44</del><span>SDG39<small>/القطعة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-10%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/13.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(5)</a></div>
                                <h6 class="product-name"><a href="single-product.html">فراولة</a></h6>
                                <h6 class="product-price"><del>SDG77</del><span>SDG54<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-15%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/14.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="#">(3)</a></div>
                                <h6 class="product-name"><a href="single-product.html">تفاح أحمر</a></h6>
                                <h6 class="product-price"><del>SDG84</del><span>SDG22<small>/الكرتونة</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text off">-10%</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button><a class="product-image" href="single-product.html"><img src="images/product/15.jpg" alt="product"></a>
                                <div class="product-widget"><a title="مقارنة المنتج" href="#" class="fas fa-random"></a><a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a><a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><a href="#">(6)</a></div>
                                <h6 class="product-name"><a href="single-product.html">لوز</a></h6>
                                <h6 class="product-price"><del>SDG85</del><span>SDG68<small>/الكيلو</small></span></h6><button class="product-add" title="إضافة الى السلة"><i class="fas fa-shopping-basket"></i><span>إضافة</span></button>
                                <div class="product-action"><button class="action-minus" title="نقصان الكيمة"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="زيادة الكمية"><i class="icofont-plus"></i></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="#" class="btn btn-outline"><i class="fas fa-eye"></i><span>عرض المزيد</span></a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="or-funfact-section position-relative">
        <div class="container">
            @php
                $clients_count          = App\Models\User::whereRoleIs('clients')->count();
                $products_count         = App\Models\Product::count();
                $promoted_dealer_count  = App\Models\PromotedDealer::count();
            @endphp
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="or-funfact-innerbox position-relative d-flex align-items-center">
                        <div class="or-funfact-icon">
                            <i class="flaticon-cheers"></i>
                        </div>
                        <div class="or-funfact-text headline pera-content">
                            <h3> <span class="counter">{{ $clients_count }}</span> <sup>+</sup></h3>
                            <p>@lang('dashboard.clients')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-funfact-innerbox position-relative d-flex align-items-center">
                        <div class="or-funfact-icon">
                            <i class="flaticon-vegetable"></i>
                        </div>
                        <div class="or-funfact-text headline pera-content">
                            <h3> <span class="counter">{{ $products_count }}</span> <sup>+</sup></h3>
                            <p>@lang('dashboard.products')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-funfact-innerbox position-relative d-flex align-items-center">
                        <div class="or-funfact-icon">
                            <i class="flaticon-dried-fruit"></i>
                        </div>
                        <div class="or-funfact-text headline pera-content">
                            <h3> <span class="counter">{{ $promoted_dealer_count }}</span> <sup>+</sup></h3>
                            <p>@lang('dashboard.promoted_dealers')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-funfact-innerbox position-relative d-flex align-items-center">
                        <div class="or-funfact-icon">
                            <i class="flaticon-beverage"></i>
                        </div>
                        <div class="or-funfact-text headline pera-content">
                            <h3> <span class="counter">27</span> <sup>+</sup></h3>
                            <p>الجوائز</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section brand-part">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>أحدث الموردين</h2>
                    </div>
                </div>
            </div>
            <div class="brand-slider slider-arrow">

                @foreach (App\Models\PromotedDealer::all() as $promoted)

                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="{{ $promoted->logo_path }}" alt="brand">
                            <div class="brand-overlay"><a href="#"><i class="fas fa-link"></i></a></div>
                        </div>
                        <div class="brand-meta">
                            <h4>{{ $promoted->name }}</h4>
                            <p>{{ $promoted->city }}</p>
                        </div>
                    </div>

                @endforeach
                
            </div>
        </div>
    </section> 


@endsection