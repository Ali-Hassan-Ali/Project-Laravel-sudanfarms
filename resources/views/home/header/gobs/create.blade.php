@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products'))

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.gobs')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.gobs')</li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.add')</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>@lang('home.profile')</h4></a>
                    </div>
                    <div class="account-content">
                        <div class="row">

		                    <form action="{{ route('gobs.store') }}" method="post">

		                        {{ csrf_field() }}
		                        {{ method_field('post') }}

		                        <div class="form-group">
		                            <label>@lang('dashboard.name') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
		                            @error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.phone') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="number" name="phone" value="{{ auth()->user()->phone }}" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
		                            @error('phone')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.email') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
		                            @error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.count') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="number" name="count" value="{{ auth()->user()->count }}" class="form-control @error('count') is-invalid @enderror" value="{{ old('count') }}">
		                            @error('count')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.start_data') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="date" name="start_data" class="form-control @error('start_data') is-invalid @enderror" value="{{ old('start_data') }}">
		                            @error('start_data')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_data') <span class="text-danger"> : @lang('lang.required')</span> </label>
		                            <input type="date" name="end_data" class="form-control @error('end_data') is-invalid @enderror" value="{{ old('end_data') }}">
		                            @error('end_data')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

                    			<div class="form-group">
	                                <label>@lang('dashboard.description') <span class="text-danger"> : @lang('lang.required')</span> </label>
	                                <textarea type="text" name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
	                                @error('description')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
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