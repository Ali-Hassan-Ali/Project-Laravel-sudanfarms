@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.categorey')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.categorey')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.categoreys.index') }}"> @lang('dashboard.categoreys')</a></li>
                <li class="active">@lang('dashboard.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    {{-- @include('partials._errors') --}}

                    <form action="{{ route('dashboard.sub_categoreys.update', $categorey->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('dashboard.name_ar')</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ $categorey->name_ar }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.name_en')</label>
                            <input type="text" name="name_en" class="form-control" value="{{ $categorey->name_en }}">
                        </div>

                        <div class="form-group">
                          <label>categoreys</label>
                          <select name="sub_categoreys" class="form-control">
                                @foreach ($categoreys as $category)

                                    <option value="{{ $category->id }}" 
                                        {{ $category->id == $categorey->sub_categoreys ? 'selected' : '' }}>{{ $category->name }}</option>
                                    
                                @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $categorey->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> @lang('dashboard.edit')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
