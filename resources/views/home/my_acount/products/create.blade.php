@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products'))



<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>الملف الشخصي</h4></a>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="profile-image">
                            	   <img src="{{ auth()->user()->image_path }}" class="rounded-circle" alt="user" width="150">
                                </div>
                            </div>

                            @include('partials._errors')

		                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

		                        {{ csrf_field() }}
		                        {{ method_field('post') }}

		                        @php
		                            $names  = ['name_ar','name_en'];
		                            $descr  = ['description_ar','description_en'];
		                            $qguard = ['quantity_guard_ar','quantity_guard_en'];
		                        @endphp

		                        @foreach ($names as $name)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $name)</label>
		                                <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) }}">
		                            </div>
		                            
		                        @endforeach

		                        @foreach ($descr as $desc)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $desc)</label>
		                                <textarea type="text" name="{{ $desc }}" class="ckeditor form-control">{{ old($desc) }}</textarea>
		                            </div>
		                            
		                        @endforeach

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select id="select-category" class="form-control">
		                                <option value="">@lang('dashboard.all_categories')</option>
		                                @foreach ($sub_categoreys as $category)
		                                    <option value="{{ $category->id }}" data-id="{{ $category->id }}" data-url="{{ route('home.sub_categorys',$category->id) }}"
		                                        {{ old('sub_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.categorey')</label>
		                            <select name="sub_category_id" id="select-sub-category" class="form-control">                            
		                                    <option value=""></option>
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.image')</label>
		                            <input type="file" multiple name="image[]" class="form-control image">
		                        </div>

		                        <div class="form-group">
		                            <img src="{{ asset('uploads/product_image/default.jpg') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price')</label>
		                            <input type="number" step="0.01" step="any" name="price" class="form-control" value="{{ old('price') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.price_decount')</label>
		                            <input type="number" step="0.01" step="any" name="price_decount" class="form-control" value="{{ old('price_decount') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.quantity')</label>
		                            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
		                        </div>

		                        @foreach ($qguard as $name)

		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $name)</label>
		                                <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) }}">
		                            </div>
		                            
		                        @endforeach

		                        <div class="form-group">
		                            <label>@lang('dashboard.start_time')</label>
		                            <input type="date" name="start_time" class="form-control" value="{{ old('start_time') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_time')</label>
		                            <input type="date" name="end_time" class="form-control" value="{{ old('end_time') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.stars')</label>
		                            <select name="stars" class="form-control">
		                                @for ($i = 1; $i < 7; $i++)
		                                    <option value="{{ $i }}">{{ $i }}</option>
		                                @endfor
		                            </select>
		                        </div>

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
