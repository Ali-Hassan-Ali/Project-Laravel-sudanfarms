@extends('home.layout.app')

@section('content')

@section('title', __('home.prfile'))    

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.dashboard')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.dashboard')</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container mx-auto">
        <div class="row mx-auto">
            <div class="col-lg-10 mx-auto">
                <div class="account-card mx-auto">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>ا@lang('home.profile')</h4></a>
                    </div>
                    <div class="account-content">
                        <form action="{{ route('change_password.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                    	<label class="form-label">@lang('home.current_password')</label>
                                    	<input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                    	<label class="form-label">@lang('home.new_password')</label>
                                    	<input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password">
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8 col-lg-8">
                                    <div class="form-group">
                                    	<label class="form-label">@lang('home.confirm_password')</label>
                                    	<input class="form-control @error('new_confirm_password') is-invalid @enderror" type="password" name="new_confirm_password">
                                        @error('new_confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4"></div>
                                <div class="col-md-6 col-lg-4 mx-auto">
                                    <div class="form-group">
                                        <button class="form-btn" type="submit">@lang('dashboard.add')</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection 