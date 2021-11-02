@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.setting_banners')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.setting_banners')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.setting_banners.index') }}"> @lang('dashboard.setting_banners')</a></li>
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

                    <form action="{{ route('dashboard.settings.setting_banners.update', $settingBanner->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names = ['title_ar','title_en'];
                            $descr = ['description_ar','description_en'];
                        @endphp

                        <div class="form-group">
                            <label>@lang('dashboard.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $settingBanner->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $settingBanner[$name] }}">
                            </div>
                            
                        @endforeach

                        @foreach ($descr as $desc)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $desc)</label>
                                <textarea type="text" name="{{ $desc }}" class="ckeditor form-control">{{ $settingBanner[$desc] }}</textarea>
                            </div>
                            
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('dashboard.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
