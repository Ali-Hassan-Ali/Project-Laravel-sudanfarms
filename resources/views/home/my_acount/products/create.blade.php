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
                        <div class="row">
                            <div class="col-10 mx-auto my-5">
                                <div class="profile-image">
                            	  
                        	<p class="text-success" style="border: solid 4px green;">اذ ارت ان تعرض المنتج بلغتين العربيه والانجلزيه يجب عليك ملئ كل الخنات او اتصال مع اذاره الموقع</p>
                                </div>
                            </div>

                            {{-- @include('partials._errors') --}}

		                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

		                        {{ csrf_field() }}
		                        {{ method_field('post') }}

		                        @php
		                            $names  = ['name_ar','name_en'];
		                            $descr  = ['description_ar','description_en','conditions_ar','conditions_en'];
		                            $qguard = ['quantity_guard_ar','quantity_guard_en'];
		                        @endphp

		                        @foreach ($names as $name)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $name)</label>
		                                <input type="text" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name) }}">
		                                @error($name)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            
		                        @endforeach

		                        @foreach ($descr as $desc)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $desc)</label>
		                                <textarea type="text" name="{{ $desc }}" class="ckeditor form-control @error($desc) is-invalid @enderror">{{ old($desc) }}</textarea>
		                                @error($desc)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            
		                        @endforeach

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select id="select-category" required class="form-control @error('email') is-invalid @enderror">
		                                <option value="">@lang('dashboard.all_categories')</option>
		                                @foreach ($sub_categoreys as $category)
		                                    <option value="{{ $category->id }}" data-id="{{ $category->id }}" data-url="{{ route('home.sub_categorys',$category->id) }}"
		                                        {{ old('sub_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select name="sub_category_id" id="select-sub-category" class="form-control @error('sub_category_id') is-invalid @enderror">                            
		                                    <option value=""></option>
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.image') | @lang('dashboard.mult_image')</label>
		                            <input type="file" multiple name="image[]" class="form-control @error('image') is-invalid @enderror image">
		                            @error('image')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

		                        <div class="form-group">
		                            <img src="{{ asset('uploads/product_image/default.jpg') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price')</label>
		                            <input type="number" step="0.01" step="any" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
		                            @error('price')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price_decount')</label>
		                            <input type="number" step="0.01" step="any" name="price_decount" class="form-control @error('price_decount') is-invalid @enderror" value="{{ old('price_decount') }}">
		                            @error('price_decount')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.quantity')</label>
		                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
		                            @error('quantity')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

		                        @foreach ($qguard as $name)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $name)</label>
		                                <input type="text" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name) }}">
		                                @error($name)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            
		                        @endforeach

		                        <div class="form-group">
		                            <label>@lang('dashboard.start_time')</label>
		                            <input type="date" name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time') }}">
		                            @error('start_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_time')</label>
		                            <input type="date" name="end_time" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}">
		                            @error('end_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
		                        </div>

{{-- 		                        <div class="form-group">
		                            <label>@lang('dashboard.stars')</label>
		                            <select name="stars" class="form-control">
		                                @for ($i = 1; $i < 7; $i++)
		                                    <option value="{{ $i }}">{{ $i }}</option>
		                                @endfor
		                            </select>
		                        </div> --}}

		                        <div class="col-md-6 col-lg-4 mx-auto">
		                            <div class="form-group">
		                                <button class="form-btn" type="submit">
		                                	<i class="fa fa-plus"></i> @lang('dashboard.add')
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


@push('products')
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '#select-category', function(e) {
                e.preventDefault();

                var $option   = $(this).find(":selected");
                var url       = $option.data('url');
                var method    = 'get';

                $.ajax({
                    url: url,
                    method: method,
                    success: function (data) {
                        
                        $.each(data, function(index, category) {
                            
                            var html = '<option value="'+category.id+'">'+category.name+'</option>';

                            $('#select-sub-category').empty('');

                            $('#select-sub-category').append(html);

                        });//end of each

                    }//end of success

                });//endof ajax
                
            });//end od change product
            
        });//end of redy
    </script>
@endpush
