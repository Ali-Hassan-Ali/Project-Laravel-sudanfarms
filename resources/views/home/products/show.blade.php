@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products') .' | '. __('dashboard.product_details'))

    <section class="single-banner inner-section">
        <div class="container">
            <h2>@lang('dashboard.product_details')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.show', $min_product->sub_category_id) }}">@lang('dashboard.products')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.product_details')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-gallery">
                        <div class="details-label-group">
                        	<label class="details-label new">جديد</label>
                            {{-- <label class="details-label off">-10%</label> --}}
                        </div>
                        <ul class="details-preview">
                        	@foreach ($image_product as $product)

	                            <li>
	                            	<img src="{{ $product->image_path }}" alt="product">
	                            </li>
                        		
                        	@endforeach
                        </ul>
                        <ul class="details-thumb">
                        	@foreach ($image_product as $product)

	                            <li>
	                            	<img src="{{ $product->image_path }}" alt="product">
	                            </li>
                        		
                        	@endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="product-navigation">
                        @if (!$prev_image_product == '0')

                            <li class="product-nav-prev">
                                <a href="{{ route('product.show',$prev_product->id) }}">
                                    <i class="icofont-arrow-right" style="margin-left: 4px;"></i>@lang('home.prev_product')
                                    <span class="product-nav-popup">
                                        <img src="{{ $prev_image_product->image_path }}" alt="product">
                                        <small>{{ $prev_product->name }}</small>
                                    </span>
                                </a>
                            </li>

                        @endif
                        @if (!$next_image_product == '0')
                            
                            <li class="product-nav-next">
                        		<a href="{{ route('product.show',$next_product->id) }}">@lang('home.next_product')<i class="icofont-arrow-left"></i>
    	                    		<span class="product-nav-popup">
    	                    			<img src="{{ $next_image_product->image_path }}" alt="product">
    	                    			<small>{{ $next_product->name }}</small>
    	                    		</span>
                        		</a>
                        	</li>

                        @endif
                    </ul>
                    
                    <div class="details-content">
                        <h3 class="details-name">{{ $min_product->name }}</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-details-frame">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row">@lang('dashboard.company_name')</th>
                                                <td>{{ $min_product->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('dashboard.quantity_Availabl')</th>
                                                <td>{{ $min_product->quantity }} / {{ $min_product->units->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('dashboard.start_time')</th>
                                                <td>{{ $min_product->start_time }} - {{ $min_product->end_time }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('dashboard.price')</th>
                                                <td>{{ $min_product->new_price }} {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('dashboard.price_decount')</th>
                                                <td>{{ $min_product->new_price_decount }} {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('dashboard.conditions')</th>
                                                <td>{!! $min_product->condition !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox mb-4"></div>
            
                        <div class="details-action-group my-3">
                            <a class="details-wish btn btn-success link-light add-cart" 
                                    data-url="{{ route('cart.add') }}" data-id="{{ $min_product->id }}">
                                <i class="fas fa-shopping-basket"></i><span> @lang('home.add_cart')</span>
                            </a>
                        </div>
                        
                        <div class="details-action-group  my-3">
                            <a class="details-wish wish link-light count-call-phone" 
                                data-url="{{ route('count_call_phone',$promoted_dealer->id) }}" href="tel:{{ $promoted_dealer->phone }}" title="@lang('dashboard.call_me')">
                                <i class="fas fa-phone-alt"></i><span>@lang('dashboard.call_me')</span>
                            </a>
                        </div>
                    
                        <div class="details-action-group">
                            <a class="details-wish wish link-light copy-link" id="copy-link" 
                                href="{{ route('product.slug', $min_product->slug) }}">
                                <i class="fas fa-copy"></i><span>@lang('dashboard.copy_link')</span>
                            </a>
                        </div>

                        @auth
                            @if ($promoted_dealer->user->id == auth()->id())
                                
                            @else

                                <div class="details-action-group my-3">
                                    <a class="details-wish wish link-light" 
                                            href="{{ route('chats.index', ['to' => $promoted_dealer->user->id]) }}">
                                        <i class="fas fa-comment-alt"></i><span> @lang('home.messages')</span>
                                    </a>
                                </div>                                

                            @endif
                            
                        @endauth
                        @if ($promoted_dealer->web_site)
                            
                            <div class="details-action-group my-3">
                                <a class="details-wish wish link-light" href="{{ $promoted_dealer->web_site }}" target="_blank">
                                    <i class="fas fa-link"></i><span> @lang('home.link')</span>
                                </a>
                            </div>

                        @endif
                        <div class="details-action-group my-3">
                            <a class="details-wish wish link-light count-call-email" 
                                data-url="{{ route('count_call_email',$promoted_dealer->id) }}" href="mailto:{{ $promoted_dealer->email }}" title="@lang('dashboard.call_me') @lang('dashboard.email')">
                                <i class="icofont-ui-email"></i><span> @lang('dashboard.email')</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">@lang('dashboard.description')</a></li>
                        <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">@lang('home.informations')</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="tab-pane" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="tab-descrip">
                                <p>{!! $min_product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="tab-spec">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="tab-descrip">
                                <p>{!! $min_product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section recent-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>@lang('home.related_products')</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach (\App\Models\Product::where('sub_category_id',$min_product->sub_category_id)->latest()->paginate(10) as $product)
                    
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
                                    <span>{{ $promoted_dealer->company_name }}</span>
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


@endsection