@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.products')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> @lang('dashboard.products')</a></li>
                <li class="active">@lang('dashboard.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names  = ['name_ar','name_en'];
                            $descr  = ['description_ar','description_en'];
                            $qguard = ['quantity_guard_ar','quantity_guard_en'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $product[$name] }}">
                            </div>
                            
                        @endforeach

                        @foreach ($descr as $desc)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $desc)</label>
                                <textarea type="text" name="{{ $desc }}" class="ckeditor form-control">{{ $product[$desc] }}</textarea>
                            </div>
                            
                        @endforeach

                        <div class="form-group">
                            <label>@lang('dashboard.categorey')</label>
                            <select name="sub_category_id" class="form-control">
                                <option value="">@lang('dashboard.all_categories')</option>
                                @foreach ($sub_categoreys as $category)
                                    <option value="{{ $category->id }}" {{ $categorey_id->id == $category->id ? 'selected' : '' }}>
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
                            <label>@lang('dashboard.image')</label>
                            <input type="file" multiple name="image[]" class="form-control image">
                        </div>

                        @php
                            $images = App\Models\ImageProduct::where('product_id',$product->id)->get();
                        @endphp

                        <div class="form-group">
                            @foreach ($images as $image)

                                <img src="{{ $image->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                                
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.price')</label>
                            <input type="number" step="0.01" step="any" name="price" class="form-control" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.price_decount')</label>
                            <input type="number" step="0.01" step="any" name="price_decount" class="form-control" value="{{ $product->price_decount }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.quantity')</label>
                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                        </div>

                        @foreach ($qguard as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $product[$name] }}">
                            </div>
                            
                        @endforeach

                        <div class="form-group">
                            <label>@lang('dashboard.start_time')</label>
                            <input type="data" name="start_time" class="form-control" value="{{ $product->start_time }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.end_time')</label>
                            <input type="data" name="end_time" class="form-control" value="{{ $product->end_time }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.stars')</label>
                            <select name="stars" class="form-control">
                                @for ($i = 1; $i < 7; $i++)
                                    <option value="{{ $i }}" {{ $i == $product->stars ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('dashboard.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
