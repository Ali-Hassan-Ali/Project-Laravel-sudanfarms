<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('home.welcome') | @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/svg" href="{{ asset('home_files/image/LOG.png') }}">
    
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('home_files/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/fonts/fontawesome/fontawesome.min.css') }}">

    {{-- include packages notify css --}}
    @notifyCss
    <style type="text/css">
        .notify {
            margin-top: 90px;
            position: absolute;
        }
    </style>
    {{-- vendor style --}}
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/viewbox.css') }}">

    {{-- custom style --}}
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/product-details.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/blog-details.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/privacy.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/about.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/index.css') }}">

    {{-- plugin  sweetalert2--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/sweetalert/sweetalert2.min.css') }}">

    {{-- plugin  tel-input css--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/tel-input/css/intlTelInput.css') }}">

    {{-- plugin  country  css--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/country/css/countrySelect.css') }}">

    {{-- chat  css--}}
    <link rel="stylesheet" href="{{ asset('home_files/css/chat.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-toggle {
            margin-bottom: 100px !important;
        }
    </style>

</head>

<body class="scrollspy" data-bs-spy="scroll" data-bs-target="#scrollspy">

    @include('home.layout.include._hedaer')

    @yield('content')

    @include('home.layout.include._footer')
        
    <x:notify-messages />
    
    <div id="amount-url" hidden>
        {{ route('amount.index') }}
    </div>

    <div id="amount-decount-url" hidden>
        {{ route('amount.decount.index') }}
    </div>
    
    <div id="getLocale" hidden>{{ app()->getLocale() }}</div>
    {{-- js vendor --}}
    <script src="{{ asset('home_files/js/vendor/jquery-1.12.4.min.js') }}"></script>
    @stack('profile')
    <script src="{{ asset('home_files/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/nice-select.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/venobox.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/countdown.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/jquery.viewbox.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/jquery.mixitup.js') }}"></script>

    {{-- js custom --}}
    <script src="{{ asset('home_files/js/custom/nice-select.js') }}"></script>
    <script src="{{ asset('home_files/js/custom/countdown.js') }}"></script>
    <script src="{{ asset('home_files/js/custom/accordion.js') }}"></script>
    <script src="{{ asset('home_files/js/custom/venobox.js') }}"></script>
    <script src="{{ asset('home_files/js/custom/slick.js') }}"></script>
    <script src="{{ asset('home_files/js/custom/main.js') }}"></script>

    {{-- plugins jquery.number --}}
    <script src="{{ asset('home_files/plugns/jquery.number.min.js') }}"></script>
    {{-- plugins sweetalert2.all.min.js --}}
    <script src="{{ asset('home_files/plugns/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- cart and shoping js --}}
    <script src="{{ asset('home_files/js/cart.js') }} "></script>

    {{-- image preview.js --}}
    <script src="{{ asset('home_files/js/image_preview.js') }} "></script>

    {{-- products js.js --}}
    <script src="{{ asset('home_files/js/products.js') }} "></script>

    {{-- products js.js --}}
    <script src="{{ asset('home_files/js/app.js') }} "></script>

    {{-- products js.js --}}
    <script src="{{ asset('home_files/js/confirm_delete.js') }} "></script>

    {{--noty js--}}
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--addtohomescreen js--}}
    <script src="{{ asset('home_files/plugns/addToHomescreen/addToHomescreen.js') }}"></script>

    {{--addtohomescreen js--}}
    <script src="{{ asset('dashboard_files/js/product.js') }}"></script>

    {{-- plugins tel-input js--}}
    <script src="{{ asset('home_files/plugns/tel-input/js/intlTelInput.js') }}"></script>

    {{-- plugins country-input js--}}
    <script src="{{ asset('home_files/plugns/country/js/countrySelect.js') }}"></script>

    @auth
    <script type="text/javascript">

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
          autoHideDialCode: true,
          initialCountry: "{{ auth()->user()->country_phone_code }}",
          separateDialCode: true,
          utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
        });

    </script>
        
    @else
    <script type="text/javascript">

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
          autoHideDialCode: true,
          initialCountry: "sd",
          separateDialCode: true,
          utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
        });

    </script>
    @endauth

    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61c9d0e839533b05"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61c9d0e839533b05"></script>

    {{-- include packages notify js --}}
    @notifyJs
    
    @stack('products')
    @stack('gallery')
    @stack('script')
    @auth

    @auth
        
    <script type="text/javascript">
        // addToHomescreen();
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
          autoHideDialCode: true,
          initialCountry: "{{ auth()->user()->country_phone_code }}",
          separateDialCode: true,
          utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
        });
    </script>
    @endauth

    <script type="text/javascript">
        $("#country_selector").countrySelect({
            defaultCountry: "{{ auth()->user()->country_code }}",
        });
    </script>
    @else
    <script type="text/javascript">
        $("#country_selector").countrySelect({
            defaultCountry: "sd",
        });
    </script>
    @endauth


    @php
        $promoted_dealer = App\Models\PromotedDealer::where('user_id', auth()->id())->first();
    @endphp

    @if ($promoted_dealer)
        <script type="text/javascript">
            $("#country-promoted-dealer").countrySelect({
                defaultCountry: "{{ $promoted_dealer->country }}",
            });
        </script>
    @else
        <script type="text/javascript">
            $("#country-promoted-dealer").countrySelect({
                defaultCountry: "sd",
            });
        </script>
    @endif


    @if ($promoted_dealer)
        <script type="text/javascript">
            var input = document.querySelector("#country_selector-promoted-master-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "{{ $promoted_dealer->phone_master_code }}",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });
        </script>
    @else
        <script type="text/javascript">
            var input = document.querySelector("#country_selector-promoted-master-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "sd",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });
        </script>
    @endif

    @if ($promoted_dealer)
        <script type="text/javascript">

            var input = document.querySelector("#country_selector-promoted-other-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "{{ $promoted_dealer->other_phone_code }}",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });

        </script>
    @else
        <script type="text/javascript">
            var input = document.querySelector("#country_selector-promoted-other-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "sd",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });
        </script>
    @endif




    @if ($promoted_dealer)
        <script type="text/javascript">
            var input = document.querySelector("#country_selector-promoted-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "{{ $promoted_dealer->phone_code }}",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });
        </script>
    @else
        <script type="text/javascript">
            var input = document.querySelector("#country_selector-promoted-phone");
            window.intlTelInput(input, {
              autoHideDialCode: true,
              initialCountry: "sd",
              separateDialCode: true,
              utilsScript: "{{ asset('home_files/plugns/tel-input/js/utils.js') }}",
            });
        </script>
    @endif
</body>
</html>