@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper" style="min-height: 956.281px;">
    
    <section class="content-header">

        <h1>@lang('dashboard.clients')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
            <li><a href="{{ route('dashboard.clients.index') }}"> @lang('dashboard.clients')</a></li>
            <li class="active">@lang('dashboard.add')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">@lang('dashboard.add')</h3>
            </div><!-- end of box header -->

            <div class="box-body">

                {{-- @include('partials._errors') --}}

                <form action="{{ route('dashboard.clients.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="form-group">
                        <label>@lang('dashboard.name')</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.username')</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.email')</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.phone')</label>
                        <input type="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.country')</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.city')</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.title')</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.image')</label>
                        <input type="file" name="image" class="form-control image">
                    </div>

                    <div class="form-group">
                        <img src="{{ asset('uploads/user_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.password')</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.password_confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div>

@endsection
