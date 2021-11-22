@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products') .' | '. __('dashboard.show'))

    <section class="single-banner inner-section">
        <div class="container">
            <h2>تفصايل المنتج</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="categories.html">المنتجات</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفصايل المنتج</li>
            </ol>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-gallery">
                        <div class="details-label-group">
                        	<label class="details-label new">جديد</label><label class="details-label off">-10%</label>
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
                        <h3 class="details-name"><a href="#">فلفل طازج</a></h3>
                        <div class="details-meta mb-1">
                            <p>@lang('dashboard.company')</p>
                            <p>{{ $promoted_dealer->name }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">@lang('dashboard.country')</p>
                            <p class="mt-0">{{ $promoted_dealer->country }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">#</p>
                            <p class="mt-0">{{ $min_product->id }}</p>
                        </div>
                        <div class="details-meta mb-1">
                            <p class="mt-0">الكمية المتوفرة:</p>
                            <p class="mt-0">{{ $min_product->quantity }} | {{ $min_product->quantity_guard }}</p>
                        </div>
                        <div class="details-meta">
                            <p class="mt-0">الفترة:</p>
                            <p class="mt-0">المنتج متوفر من  {{ $min_product->start_time }} to {{ $min_product->end_time }}</p>
                        </div>

                        <h3 class="details-price"><del>SDG38.00</del> <span> SDG24.00<small>/الكيلو</small></span></h3>
                        <p class="details-desc">{{ $min_product->description }}</p>
                        <div class="details-list-group"><label class="details-list-title">منتجات مماثلة:</label>
                            <ul class="details-tag-list">
                                <li><a href="#">فلفل أخضر</a></li>
                                <li><a href="#">خضروات</a></li>
                                <li><a href="#">فلفل حار</a></li>
                            </ul>
                        </div>
                        <div class="details-list-group"><label class="details-list-title">مشاركة:</label>
                            <ul class="details-share-list">
                                <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                <li><a href="#" class="icofont-pinterest" title="Pinterest"></a></li>
                            </ul>
                        </div>
                        <div class="details-action-group"><a class="details-wish wish" href="#" title="التواصل مع التاجر"><i class="fas fa-phone-alt"></i><span>التواصل مع التاجر</span></a></div>
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
                        <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">الوصف</a></li>
                        <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">معلومات</a></li>
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
                                        <th scope="row">رقم المنتج</th>
                                        <td>101783</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الكمية المتوفرة</th>
                                        <td>100 طن</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">تاريخ توفر المنتج</th>
                                        <td>متوفر من 3 أكتوبر 2021 الي 3 أبريل 2022</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">السعر</th>
                                        <td>350 SDG</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الموقع</th>
                                        <td>ولاية الخرطوم</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الشحن والتسليم</th>
                                        <td>بحري</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الشروط</th>
                                        <td>دفع 30 في المية من قيمة البضاعة والباقي مع البوليصة والسعر بالدولار</td>
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