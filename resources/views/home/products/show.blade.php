@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products') .' | '. __('dashboard.product_details'))

    <section class="single-banner inner-section">
        <div class="container">
            <h2>@lang('dashboard.product_details')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.show',$min_product->sub_category_id) }}">@lang('dashboard.products')</a></li>
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
                        <div class="details-meta mb-1">
                            <p>@lang('dashboard.company')</p>
                            <p>{{ $promoted_dealer->name }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">@lang('dashboard.country')</p>
                            <p class="mt-0">{{ $promoted_dealer->country }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">ID</p>
                            <p class="mt-0">{{ $min_product->id }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">ا@lang('dashboard.quantity_Availabl'):</p>
                            <p class="mt-0">{{ $min_product->quantity }} | {{ $min_product->quantity_guard }}</p>
                        </div>
                        <div class="details-meta">
                            <p class="mt-0">@lang('dashboard.period'):</p>
                            <p class="mt-0">@lang('dashboard.product_available')  {{ $min_product->start_time }} - {{ $min_product->end_time }}</p>
                        </div>

                        <h3 class="details-price">
                            <del>{{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG'}}{{ $min_product->new_price_decount }}</del> 
                            <span>{{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG'}}
                                  {{ $min_product->new_price }}
                            <small> /{{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG'}}</small>
                            </span>
                        </h3>
                        <p class="details-desc">{{ $min_product->description }}</p>
                        <div class="details-list-group"><label class="details-list-title">@lang('dashboard.similar_products'):</label>
                            <ul class="details-tag-list">
                                @foreach ($category_product as $category)
                                
                                    <li>
                                        <a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a>
                                    </li>
                                    
                                @endforeach
                            </ul>
                        </div>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox mb-4"></div>
            
                        <div class="details-action-group">
                            <a class="details-wish wish count-call-phone" 
                                data-url="{{ route('count_call_phone',$promoted_dealer->id) }}" href="tel:{{ $promoted_dealer->phone }}" title="@lang('dashboard.call_me')">
                                <i class="fas fa-phone-alt"></i><span>@lang('dashboard.call_me')</span>
                            </a>
                        </div>
                        <div class="details-action-group my-3">
                            <a class="details-wish wish count-call-email" 
                                data-url="{{ route('count_call_email',$promoted_dealer->id) }}" href="mailto:{{ $promoted_dealer->email }}" title="@lang('dashboard.call_me') @lang('dashboard.email')">
                                <i class="icofont-ui-email"></i><span> @lang('dashboard.email')</span>
                            </a>
                        </div>
                        <div class="details-action-group my-3">
                            <a class="details-wish wish count-call-email add-cart" 
                                    data-url="{{ route('cart.add') }}" data-id="{{ $min_product->id }}">
                                <i class="fas fa-shopping-basket"></i><span> @lang('home.add_cart')</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">@lang('dashboard.description')</a></li>
                        <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">@lang('home.informations')</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane active" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="tab-descrip">
                                <p>{{ $min_product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-spec">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">@lang('dashboard.quantity_Availabl')</th>
                                        <td>{{ $min_product->quantity }} {{ $min_product->quantity_guard }}</td>
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
                                        <th scope="row">@lang('dashboard.map')</th>
                                        <td>{{ $promoted_dealer->city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('dashboard.conditions')</th>
                                        <td>{{ $min_product->condition }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection