@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.products')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> @lang('dashboard.categorey')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @php
                            $names  = ['name_ar','name_en'];
                            $descr  = ['description_ar','description_en','conditions_ar','conditions_en'];
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

                        <div class="form-group d-none">
                            <label>@lang('dashboard.categorey')</label>
                            <select id="select-category" class="form-control">
                                <option value="">@lang('dashboard.select_category')</option>
                                @foreach ($sub_categoreys as $category)
                                    <option value="{{ $category->id }}" data-id="{{ $category->id }}" data-url="{{ route('dashboard.sub_categorys',$category->id) }}"
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
                            <label>@lang('lang.width') 450px | @lang('lang.height') 450px</label> <br>
                            <label>@lang('dashboard.image') | @lang('dashboard.mult_image')</label> <br>
                            <label>@lang('dashboard.image')</label>
                            <input type="file" multiple name="image[]" accept="image/*" class="form-control image" id="file-input">
                        </div>

                        <div class="form-group">
                            <div id="preview" class="d-flex justify-content-center"></div>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.price')</label>
                            <p class="text-red product-val-price">0</p>
                            <p class="text-red totle-price">0</p>
                            <input type="number" name="price" class="form-control product-price" value="{{ session('product-price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.price_decount')</label>
                            <p class="text-red product-val-decount">0</p>
                            <p class="text-red totle-decount">0</p>
                            <input type="number" name="price_decount" class="form-control product-decount" value="{{ session('product-decount-price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.quantity')</label>
                            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.units')</label>
                            <select name="units_id" required class="form-control @error('email') is-invalid @enderror">
                                <option value="">@lang('dashboard.select_unit')</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" 
                                        {{ old('units_id') == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.start_time')</label>
                            <input type="date" name="start_time" class="form-control" value="{{ old('start_time') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.end_time')</label>
                            <input type="date" name="end_time" class="form-control" value="{{ old('end_time') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->
    </div><!-- end of content wrapper -->

@endsection