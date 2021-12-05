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
                            <img src="http://clickgrafix.cloud/sd-farm/images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>إنضم الآن!</h2>
                        </div>
                        <form class="user-form" action="{{ route('home.register.store') }}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="@lang('dashboard.email')">
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
                                    <label for="remember" class="custom-control-label ">@lang('home.remember')</label>
                                </div>
                            </div>
                            <div class="form-button">
                                <button type="submit">تسجيل</button>
                            </div>
                        </form>
                    </div>
                    <div class="user-form-remind">
                        <p>لديك حساب ?<a href="{{ route('home.login') }}">تسجيل دخول</a></p>
                    </div>
                    <div class="user-form-footer">
                        <p>مزارع السودان | &COPY; جميع الحقوق محفوظة لـ <a href="{{ route('home.login') }}">مزارع السودان</a></p>
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