@extends('home.layout.app')

@section('content')

@section('title', __('home.welcome'))   

    <section class="home-index-slider slider-arrow slider-dots">
        
        @foreach (App\Models\SettingBanner::all() as $index=>$data)

        <div class="banner-part banner-4" style="background: url({{ $data->image_path }});">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6 col-lg-6">
                        <div class="banner-content">
                            <h1 class="text-white">{{ $data->title }}</h1>
                            <p class="text-white">{{ $data->description }}</p>
                            <div class="banner-btn">
                                <a class="btn btn-inline" href="{{ route('shops.index') }}">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('dashboard.shop')</span>
                                </a>
                                <a class="btn btn-outline" href="{{ route('offers.clients.index') }}">
                                    <i class="icofont-sale-discount"></i><span>@lang('dashboard.offers')</span>
                                </a>
                            </div>
                        </div>
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
                        <h2>@lang('home.newly_added_products')</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach (\App\Models\Product::latest()->paginate(10) as $product)
                    
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">@lang('lang.new')</label>
                                </div>
                                <button class="product-wish wish"><i class="fas fa-heart"></i></button>
                                @php

                                    $user_id = $product->user->id;

                                    $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                @endphp
                                <a class="product-image" href="{{ route('product.show',$product->id) }}">
                                    <img src="{{ $product->image_path }}" alt="product" style="width: 100%;">
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
                                    <del>{{ $product->cury }} {{ $product->new_price_decount }}</del>
                                    <span>{{ $product->cury }} {{ $product->new_price }}<small>/{{ $product->quantity_guard }}</small></span>
                                </h6>
                                <button class="product-add add-cart" data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}" title="@lang('home.add_cart')">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="{{ route('shops.index') }}" class="btn btn-outline"><i class="fas fa-eye"></i><span>@lang('dashboard.view_more')</span></a></div>
                </div>
            </div>
        </div>
    </section>

    @php
         $advertone = App\Models\Advertisement::where('id', '1')->first();
         $adverttow = App\Models\Advertisement::where('id', '2')->first();
         $adverthre = App\Models\Advertisement::where('id', '3')->first();
    @endphp

    @if ($advertone->status == '1')

        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promo-img">
                            <a href="{{ $advertone->link }}" target="_blank">
                                <img src="{{ $advertone->image_path }}" alt="promo">
                            </a>
                            <h3>{{ $advertone->title }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <section class="section feature-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>@lang('home.featured_products')</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                
                @foreach (\App\Models\Product::inRandomOrder()->latest()->paginate(6) as $product)
                
                    <div class="col">
                        <div class="feature-card">
                            <div class="feature-media">
                                <div class="feature-label">
                                    <label class="label-text feat">@lang('home.special')</label>
                                </div>
                                <button class="feature-wish wish">
                                    <i class="fas fa-heart"></i>
                                </button>
                                @php

                                    $user_id = $product->user->id;

                                    $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                @endphp
                                <a class="feature-image" href="{{ route('product.show',$product->id) }}">
                                    <img src="{{ $product->image_path }}" alt="product">
                                </a>
                                <div class="feature-widget">
                                    <a title="مقارنة المنتج" href="#" class="fas fa-random"></a>
                                    <a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                    <a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h6 class="feature-name">
                                    <a href="#">كوسة هجين روزينا</a></h6>
                                <div class="feature-rating">
                                    @for ($i = 0; $i < $product->stars; $i++)
                                        <i class="active icofont-star"></i>
                                    @endfor
                                    {{-- <i class="icofont-star"></i> --}}
                                    <a href="{{ route('product.show',$product->id) }}">{{ $promoted_dealer->name }}</a>
                                </div>
                                <h6 class="feature-price">
                                    <del>{{ $product->cury }} {{ $product->new_price_decount }} </del>
                                    <span>{{ $product->cury }} {{ $product->new_price }} <small>/{{ $product->quantity_guard }}</small></span>
                                </h6>
                                <p class="feature-desc">{{ $product->description }}</p>
                                <button class="product-add add-cart" data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}" title="@lang('home.add_cart')">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25">
                        <a href="{{ route('shops.index') }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i><span>@lang('dashboard.view_more')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (setting('status_offer') == 1)
    
        <section class="section countdown-part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="countdown-content">
                            <h3>@lang('home.an_offer') {{ $offer->category->name }} @lang('home.farms_of_sudan')</h3>
                            <div class="countdown countdown-clock" data-countdown="2021/12/09">
                                <span class="countdown-time">
                                    <span>00</span><small>أيام</small>
                                </span>
                                <span class="countdown-time">
                                    <span>00</span><small>ساعات</small></span>
                                    <span class="countdown-time"><span>00</span><small>دقائق</small></span>
                                    <span class="countdown-time"><span>00</span><small>ثواني</small></span>
                                </div>
                                <a href="{{ route('offers.clients.show',$offer->category_id) }}" class="btn btn-inline">
                                    <i class="fas fa-shopping-basket"></i><span>@lang('dashboard.shop')</span>
                                </a>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="countdown-img"><img src="{{ asset('home_files/image/countdown.png') }}" alt="countdown">
                            <div class="countdown-off"><span>{{ $offer->new_price }}</span>
                                <span style="font-size: 18px;">@lang('home.discount')</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    @endif


    <section class="section newitem-part">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-heading">
                        <h2>@lang('home.new_products')</h2>
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
                                    <button class="product-wish wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    @php

                                        $user_id = $product->user->id;

                                        $promoted_dealer = App\Models\PromotedDealer::where('user_id',$user_id)->first();

                                    @endphp
                                    <a class="product-image" href="{{ route('product.show',$product->id) }}">
                                        <img src="{{ $product->image_path }}" alt="product">
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
                                        <a href="#">({{ $product->stars }})</a>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a>
                                    </h6>
                                    <h6 class="product-price mb-0">
                                        <del>{{ $product->cury }} {{ $product->new_price_decount }}</del>
                                        <span>{{ $product->cury }} {{ $product->new_price }}<small>/{{ $product->quantity_guard }}</small></span>
                                    </h6>
                                    <h6 class="product-price"><span>{{ $promoted_dealer->name }}</span></h6>
                                    <button class="product-add add-cart" data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}" title="@lang('home.add_cart')">
                                        <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                    </button>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="section-btn-25">
                        <a href="{{ route('shops.index') }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i><span>@lang('dashboard.shop')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section promo-part">
        <div class="container">
            <div class="row">

                @if ($adverttow->status == '1')

                    <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                        <div class="promo-img">
                            <a href="{{ $adverttow->link }}"><img src="{{ $adverttow->image_path }}" alt="promo"></a>
                            <h3>{{ $adverttow->title }}</h3>
                        </div>
                    </div>
                    
                @endif

                @if ($adverthre->status == '1')
                <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                    <div class="promo-img">
                        <a href="{{ $adverthre->link }}" target="_blank">
                            <img src="{{ $adverthre->image_path }}" alt="promo">
                        </a>
                        <h3>{{ $adverthre->title }}</h3>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


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
                            <h3> <span class="counter">{{ $offers }}</span> <sup>+</sup></h3>
                            <p>@lang('dashboard.offers')</p>
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
                        <h2>@lang('home.latest_suppliers')</h2>
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