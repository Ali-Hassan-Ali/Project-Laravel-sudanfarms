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
    <link rel="stylesheet" href="{{ asset('home_files/css/custom/index.css') }}">

    {{-- plugin  sweetalert2--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/sweetalert/sweetalert2.min.css') }} ">

    {{-- plugin  addtohomescreen--}}
    <link rel="stylesheet" href="{{ asset('home_files/plugns/addtohomescreen/addtohomescreen.css') }} ">

</head>

<body class="scrollspy" data-bs-spy="scroll" data-bs-target="#scrollspy">

    @include('home.layout.include._hedaer')

    @yield('content')

    @include('home.layout.include._footer')
        
    <x:notify-messages />

    {{-- js vendor --}}
    <script src="{{ asset('home_files/js/vendor/jquery-1.12.4.min.js') }}"></script>
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
    <script src="{{ asset('home_files/js/confirm_delete.js') }} "></script>

    {{--noty js--}}
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--addtohomescreen js--}}
    <script src="{{ asset('home_files/plugns/addToHomescreen/addToHomescreen.js') }}"></script>

    <script type="text/javascript">
        addToHomescreen();
    </script>

    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61c9d0e839533b05"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61c9d0e839533b05"></script>


    {{-- include packages notify js --}}
    @notifyJs
    
    @stack('profile')
    @stack('products')
    @stack('gallery')
</body>

</html>