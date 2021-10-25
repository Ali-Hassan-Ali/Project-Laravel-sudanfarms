@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper" style="min-height: 956.281px;">
    
    <section class="content-header">

        <h1>@lang('dashboard.clients')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
            <li><a href="{{ route('dashboard.clients.index') }}"> @lang('dashboard.clients')</a></li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}


                    <div class="form-group">
                        <label>@lang('dashboard.name')</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $client->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.username')</label>
                        <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $client->username }}">
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.email')</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $client->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.phone')</label>
                        <input type="phone" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $client->phone }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.country')</label>
                        <input type="text" name="country" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ $client->country }}">
                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.city')</label>
                        <input type="text" name="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ $client->city }}">
                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.title')</label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $client->title }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.image')</label>
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} image">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <img src="{{ $client->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.edit')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div>

@endsection
