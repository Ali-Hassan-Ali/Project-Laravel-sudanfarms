@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.search'))

<section class="section recent-part mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>@lang('dashboard.search')</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

			@if ($products->count() > 0)

	            @foreach ($products as $product)
	                
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
                                    <span>
                                        {{ $product->cury }} {{ $product->new_price }}
                                        <small>/{{ $product->units->name }}</small>
                                    </span>
                                </h6>
                                <h6 class="product-price">
                                    <span>
                                        <del>
                                            {{ $product->cury }} {{ $product->new_price_decount }}
                                        </del>
                                        <small>/{{ $product->units->name }}</small>
                                    </span>
                                </h6>
	                            <button class="product-add add-cart" 
                                    	data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}" 
                                    	title="@lang('home.add_cart')">
	                                <i class="fas fa-shopping-basket"></i><span>@lang('home.add_cart')</span>
	                            </button>
	                        </div>
	                    </div>
	                </div>

	            @endforeach

            @endif
            
        </div>

        @if (!$products->count() > 0)

		    <section class="error-part">

		        <div class="container">
		            <h2 class="d-flex justify-content-center">@lang('dashboard.no_data_found')</h2>
		        </div>

		    </section>
        	
        @endif

    </div>
</section>

@endsection