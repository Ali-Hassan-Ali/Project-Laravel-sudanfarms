--<!DOCTYPE html>
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

    {{-- plugin  tel-input css--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/tel-input/css/intlTelInput.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('home_files/plugns/tel-input/css/demo.css') }}"> --}}
</head>

<body>
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="user-form-logo">
                        <a href="{{ route('welcome.index') }}">
                            <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>@lang('lang.Join')</h2>
                        </div>
                        <form class="user-form" id="register" action="{{ route('home.register.store') }}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="@lang('dashboard.name')" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" type="number" value="{{ old('phone') }}" required>
                                <input id="code" name="phone_code" type="tel" value="+249" hidden>
                                <input id="country-code" name="country_phone_code" type="text" value="sd" hidden>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" value="test@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="@lang('dashboard.email')" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('dashboard.password')" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" 
                                placeholder="@lang('dashboard.password_confirmation')" required>
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
                                    @lang('lang.Login_by_Facebook')
                                </a>
                            </div>
                            <p class="text-center">or</p>
                            <div class="form-button">
                                <a href="{{ url('login/google') }}" class="btn btn-block col-12 my-2 btn-primary" style="background:#ea4335;">
                                    @lang('lang.Login_by_Google')
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

        {{-- plugins tel-input js--}}
    <script src="{{ asset('home_files/plugns/tel-input/js/intlTelInput.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#register').on('click', function () {

                var code = $('.iti__selected-dial-code').text();
                
                $('#code').val(code);
                
            });//end of click
    
        });
        // addToHomescreen();
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
          // allowDropdown: true,
          autoHideDialCode: true,
          // autoPlaceholder: "off",
          // dropdownContainer: document.body,
          // excludeCountries: ["sd"],
          // formatOnDisplay: false,
          // geoIpLookup: function(callback) {
          //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          //     var countryCode = (resp && resp.country) ? resp.country : "";
          //     callback(countryCode);
          //   });
          // },
          // hiddenInput: "full_number",
          initialCountry: "sd",
          // localizedCountries: { 'de': 'Deutschland' },
          // nationalMode: false,
          // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
          // placeholderNumberType: "MOBILE",
          // preferredCountries: ['cn', 'jp'],
          separateDialCode: true,
          utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
        });
    </script>
</body>

</html>