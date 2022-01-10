@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.shop'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.products')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.products')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section shop-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-3">

                    <div class="shop-widget-promo">
                        <a href="#">
                            <img src="{{ asset('home_files/image/blog/07.jpg') }}" alt="promo">
                        </a>
                    </div>

                    <div class="shop-widget">
                        <h6 class="shop-widget-title">@lang('lang.filter_by_price')</h6>
                        <form action="{{ route('shops.index') }}" method="get">
                            <div class="shop-widget-group">
                                <input name="from_price" value="{{ request()->from_price }}" required type="number" placeholder="أقل - 00">
                                <input name="to_price" value="{{ request()->to_price }}" required type="text" placeholder="أكثر -  ">
                            </div>
                            <button class="shop-widget-btn">
                                <i class="fas fa-search"></i>
                                <span>@lang('dashboard.search')</span>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                        @foreach ($products as $product)
                            
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
                            <div class="bottom-paginate">

                                @include('paginations.defulte',$products)

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection