@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.advertisements')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.advertisements')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.advertisements.index') }}"> @lang('dashboard.advertisements')</a></li>
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

                    <form action="{{ route('dashboard.settings.advertisements.update', $advertisement->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names = ['title_ar','title_en','link'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $advertisement[$name] }}">
                            </div>

                        @endforeach

                        <div class="form-group">
                          <label>@lang('dashboard.status')</label>
                          <select name="status" class="form-control">

                                <option value="1" {{ $advertisement->status == '1' ? 'selected' : '' }}>@lang('dashboard.available')</option>
                                <option value="0" {{ $advertisement->status == '0' ? 'selected' : '' }}>@lang('dashboard.not_available')</option>
                                    
                          </select>
                        </div>

                        <div class="form-group">
                            @if ($advertisement->id == '1')
                                <label>@lang('dashboard.image') width: 1920 height:380</label>
                            @else
                                <label>@lang('dashboard.image') width: 980 height:620</label>
                            @endif
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $advertisement->image_path }}" width="1920" height="380" class="img-thumbnail image-preview" alt="">
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
