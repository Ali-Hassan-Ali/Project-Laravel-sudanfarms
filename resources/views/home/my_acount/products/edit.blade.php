@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products'))

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.dashboard')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">@lang('home.profile')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.products')</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-content">
                        <div class="row pt-5 mt-5">
                           
                            @include('partials._errors')

		                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

		                        {{ csrf_field() }}
		                        {{ method_field('put') }}

		                        @php
		                            $names  = ['name_ar','name_en'];
		                            $descr  = ['description_ar','description_en','conditions_ar','conditions_en'];
		                        @endphp

		                        @foreach ($names as $name)

		                            <div class="form-group">
		                                <label>@lang(app()->getLocale() == 'ar' ? 'dashboard.product_name_ar' : 'dashboard.product_name_en')</label>
		                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $product[$name] }}" required>
		                            </div>
		                            
		                        @endforeach

		                        @foreach ($descr as $desc)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $desc)</label>
		                                <textarea type="text" name="{{ $desc }}" required class="ckeditor form-control">{{ $product[$desc] }}</textarea>
		                            </div>
		                            
		                        @endforeach

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select id="select-category" required name="sub_category_id" class="form-control">
		                                <option value="">@lang('dashboard.all_categories')</option>
		                                @foreach ($sub_categoreys as $category)
		                                    <option value="{{ $category->id }}" data-id="{{ $category->id }}" data-url="{{ route('home.sub_categorys',$category->id) }}" {{ $categorey_id->id == $category->id ? 'selected' : '' }}>
		                                        {{ $category->name }}
		                                    </option>
		                                @endforeach
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select name="sub_category_id" id="select-sub-category" class="form-control">                            
		                                    <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
		                            </select>
		                        </div>

		                        <div class="form-group">
		                        	<label>@lang('lang.width') 450px | @lang('lang.height') 450px</label>
		                            <label>@lang('dashboard.image') | @lang('dashboard.mult_image')</label>
		                            <input type="file" multiple required name="image[]" accept="image/*" class="form-control image" id="file-input">
		                        </div>

		                        <div class="form-group">
		                            <div id="preview" class="d-flex justify-content-center">
			                            @foreach ($product->imageProduct as $image)

			                                <img src="{{ $image->image_path }}" width="100">
			                                
			                            @endforeach
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price')</label>
		                            <p class="text-red product-val-price">{{ $product->price }} $</p>
                            		<p class="text-red totle-price">{{ $product->new_price }} {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }}</p>
		                            <input type="number" name="price" class="form-control product-price" 
		                            		value="{{ $product->price }}" required>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price_decount')</label>
		                            <p class="text-red product-val-decount">{{ $product->price_decount }} $</p>
                            		<p class="text-red totle-decount">{{ $product->new_price_decount }} {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }}</p>
                            		<input type="number" name="price_decount" class="form-control product-decount @error('price_decount') is-invalid @enderror" 
                            			   value="{{ $product->price_decount }}" required>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.quantity')</label>
		                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.units')</label>
		                            <select name="units_id" required class="form-control @error('email') is-invalid @enderror">
		                                <option value="">@lang('dashboard.all_categories')</option>
		                                @foreach ($units as $unit)
		                                    <option value="{{ $unit->id }}" 
		                                        {{ $unit->id == $product->units_id ? 'selected' : '' }}>
		                                        {{ $unit->name }}
		                                    </option>
		                                @endforeach
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.start_time')</label>
		                            <input type="date" name="start_time" class="form-control" value="{{ $product->start_time }}" required>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_time')</label>
		                            <input type="date" name="end_time" class="form-control" value="{{ $product->end_time }}" required>
		                        </div>

		                        <div class="col-md-6 col-lg-4 mx-auto">
		                            <div class="form-group">
		                                <button class="form-btn" type="submit">
		                                	<i class="fa fa-plus"></i> @lang('dashboard.edit')
		                                </button>
		                            </div>
		                        </div>

		                    </form><!-- end of form -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
