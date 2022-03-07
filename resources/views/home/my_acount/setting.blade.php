@extends('home.layout.app')

@section('content')

@section('title', __('home.profile'))    

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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if ($promoted_dealer)

                    @if ($promoted_dealer->status == -1)
                
                        <div class="alert alert-danger py-3 my-5 text-center" role="alert">
                          @lang('lang.account_activation')
                        </div>

                    @endif

                @endif

                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>ا@lang('home.profile')</h4></a>
                        {{-- <a href="{{ route('change_password.index') }}"><h4>الملف الشخصي</h4></a> --}}
                    </div>
                    <div class="account-content">

                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="profile-image">
                                        <a href="" onclick="event.preventDefault();document.getElementById('user-image').click();">

                                           <img src="{{ auth()->user()->image_path }}" class="rounded-circle user-image" alt="user" width="150">

                                        </a>
                                    </div>
                                </div>

                                <input type="file" name="image" hidden id="user-image">

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.name') <span class="text-danger"> : @lang('lang.required')</span></label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ auth()->user()->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.email') <span class="text-danger"> : @lang('lang.required')</span></label>
                                        <input class="form-control @error('email') is-invalid @enderror" disabled type="email" name="email" value="{{ auth()->user()->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <div class="profile-btn">
                                        <a href="{{ route('change_password.index') }}">@lang('home.change_password')</a>
                                    </div>
                                </div>

                                <div class="col-lg-2"></div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.phone') <span class="text-danger"> : @lang('lang.required')</span></label>
                                        <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{ auth()->user()->phone }}">
                                        <input id="code" name="phone_code" type="tel" value="+{{ auth()->user()->phone_code }}" hidden>
                                        <input id="country-code" name="country_phone_code" type="text" value="{{ auth()->user()->country_phone_code }}" hidden>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.country') <span class="text-danger"> : @lang('lang.required')</span></label>
                                        <br>
                                        <input id="country_selector" class="form-control @error('country') is-invalid @enderror" type="text" name="country">
                                        <input id="country-user-code" type="text" name="country_code" value="{{ auth()->user()->country_code }}" hidden>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                </div>

                                <div class="col-lg-2">
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.city')</label>
                                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ auth()->user()->city }}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">@lang('dashboard.title')</label>
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ auth()->user()->title }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4 mx-auto">
                                    <div class="form-group">
                                        <button class="form-btn" type="submit">@lang('dashboard.add')</button>
                                    </div>
                                </div>

                            </form>

                            <div class="col-md-6 col-lg-4 mx-auto">
                                <div class="form-group">
                                    <a href="{{ route('home.login') }}" class="form-btn"
                                    onclick="event.preventDefault();document.getElementById('logout-user-form').submit();">
                                    @lang('dashboard.logout')</a>
                                </div>
                            </div>

                            <form action="{{ route('home.logout') }}" method="post" id="logout-user-form" style="display: none;">
                                @csrf

                            </form>


                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>


@endsection