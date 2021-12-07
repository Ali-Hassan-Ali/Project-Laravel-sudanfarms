<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('home.welcome') | @lang('dashboard.login')</title>
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
                        <a href="/"><img src="{{ asset('home_files/image/logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>@lang('lang.Join')</h2>
                            <p>@lang('lang.create_new')</p>
                        </div>
                        <form class="user-form" action="{{ route('home.login.store') }}" method="post">
                            @csrf
                            @method('post')
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
                            <div class="form-button"><button type="submit">@lang('dashboard.login')</button></div>
                        </form>
                    </div>
                    <div class="user-form-remind">
                        <p>@lang('lang.have_account') <a href="{{ route('home.register') }}">@lang('dashboard.register')</a></p>
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