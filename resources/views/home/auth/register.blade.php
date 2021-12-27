<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('home.welcome') | @lang('dashboard.register')</title>
    <link rel="icon" href="{{ asset('home_files/image/logo.svg') }}">

    {{-- vendor style --}}
    <link rel="stylesheet" href="{{ asset('home_files/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/bootstrap.min.css') }}">

    {{-- custom style --}}
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/user-form.css') }}">
</head>

<body>
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="user-form-logo">
                        <a href="/">
                            <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>@lang('lang.Join')</h2>
                        </div>
                        <form class="user-form" action="{{ route('home.register.store') }}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="@lang('dashboard.name')">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="@lang('dashboard.username')">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="@lang('dashboard.phone')">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="@lang('dashboard.email')">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('dashboard.password')">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" 
                                placeholder="@lang('dashboard.password_confirmation')">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="custom-control-label" >@lang('home.remember')</label>
                                </div>
                            </div>
                            <div class="form-button">
                                <button type="submit">@lang('dashboard.register')</button>
                            </div>

                            <hr>
                            <div class="form-button">
                                <a href="{{ url('login/facebook') }}" class="btn btn-block col-12 my-2 btn-primary" style="background:#3b5998;">
                                    Login by Facebook
                                </a>
                            </div>
                            <div class="form-button">
                                <a href="{{ url('login/google') }}" class="btn btn-block col-12 my-2 btn-primary" style="background:#ea4335;">
                                    Login by Gmail
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="user-form-remind">
                        <p>@lang('lang.have_account') <a href="{{ route('home.login') }}">@lang('dashboard.login')</a></p>
                    </div>
                    <div class="user-form-footer">
                        <p>@lang('lang.&COPY')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('home_files/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/bootstrap.min.js') }}"></script>
</body>

</html>