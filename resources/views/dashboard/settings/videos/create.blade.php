@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.categorey')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.categorey')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.videos.index') }}"> @lang('dashboard.videos')</a></li>
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

                    <form action="{{ route('dashboard.settings.videos.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @php
                            $names = ['name_ar','name_en'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) }}">
                            </div>

                        @endforeach

                        <div class="form-group">
                          <label>video_categorys</label>
                          <select name="video_categories_id" class="form-control">
                                @foreach ($video_categorys as $categorey)

                                    <option value="{{ $categorey->id }}" {{ old('video_categories_id') == $categorey->id ? 'selected' : '' }}>{{ $categorey->name }}</option>
                                    
                                @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.video_url')</label>
                            <input type="text" name="video_url" value="{{ old('video_url') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> @lang('dashboard.add')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
