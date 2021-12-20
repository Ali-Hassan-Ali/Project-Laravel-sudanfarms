@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.shop'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>المنتجات</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
            </ol>
        </div>
    </section>
    <section class="inner-section shop-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-3">
                    <div class="shop-widget-promo"><a href="#"><img src="{{ asset('home_files/image/blog/07.jpg') }}" alt="promo"></a></div>
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">تصفية حسب السعر</h6>
                        <form>
                            <div class="shop-widget-group"><input type="text" placeholder="أقل - 00"><input type="text" placeholder="أكثر - SDG"></div><button class="shop-widget-btn"><i class="fas fa-search"></i><span>بحث</span></button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-filter">
                                <div class="filter-show"><label class="filter-label">عرض :</label><select class="form-select filter-select">
                                        <option value="1">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select></div>
                                <div class="filter-short"><label class="filter-label">ترتيب بحسب :</label><select class="form-select filter-select">
                                        <option selected="">الإفتراضي</option>
                                        <option value="3">السعر</option>
                                        <option value="1">العروض المميزة</option>
                                        <option value="2">الخصم</option>
                                    </select></div>

                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                        @foreach ($products as $product)
                            
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-label">
                                            <label class="label-text new">جديد</label>
                                        </div>
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
                                            <i class="icofont-star">
                                            </i><a href="{{ route('product.show',$product->id) }}">({{ $product->stars }})</a>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a>
                                        </h6>
                                        <h6 class="product-price">
                                            <del>SDG{{ $product->price_decount }}</del>
                                            <span>SDG{{ $product->price }}<small>/{{ $product->quantity_guard }}</small></span>
                                        </h6>
                                        <h6 class="product-price"><span>{{ $promoted_dealer->name }}</span></h6>
                                        <button class="product-add add-cart" data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}" title="@lang('home.add_cart')">
                                            <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
                                        </button>
                                        <div class="product-action">
                                            <button class="action-minus add-cart" data-id="{{ $product->id }}" title="Quantity Minus">
                                                <i class="icofont-minus"></i>
                                            </button>
                                            <input class="action-input" id="add-cart-product-{{ $product->id }}" title="Quantity Number" type="text" name="quantity" value="1">
                                            <button class="action-plus add-cart" data-id="{{ $product->id }}" title="Quantity Plus">
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
                            <div class="bottom-paginate">
                                <p class="page-info">عرض 12 من 60 نتائج لـ الخضروات</p>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">...</li>
                                    <li class="page-item"><a class="page-link" href="#">60</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection