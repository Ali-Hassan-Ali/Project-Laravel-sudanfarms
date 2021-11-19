
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>مزارع السودان - الرئيسية</title>
    <link rel="icon" href="images/logo.svg">
    {{-- <link rel="stylesheet" href="http://clickgrafix.cloud/sd-farm/fonts/flaticon/flaticon.css"> --}}
    {{-- <link rel="stylesheet" href="http://clickgrafix.cloud/sd-farm/fonts/icofont/icofont.min.css"> --}}
    {{-- <link rel="stylesheet" href="http://clickgrafix.cloud/sd-farm/fonts/fontawesome/fontawesome.min.css"> --}}
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('home_files/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/fonts/fontawesome/fontawesome.min.css') }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('home_files/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home_files/css/index.css') }}">
</head>

<body>

    @include('home.layout.include._hedaer')

    @yield('content')

    @include('home.layout.include._footer')


    <script src="{{ asset('home_files/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('home_files/js/popper.min.js') }}"></script>
    <script src="{{ asset('home_files/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home_files/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('home_files/js/venobox.min.js') }}"></script>
    <script src="{{ asset('home_files/js/countdown.min.js') }}"></script>
    <script src="{{ asset('home_files/js/slick.min.js') }}"></script>
    <script src="{{ asset('home_files/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('home_files/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('home_files/js/nice-select.js') }}"></script>
    <script src="{{ asset('home_files/js/countdown.js') }}"></script>
    <script src="{{ asset('home_files/js/accordion.js') }}"></script>
    <script src="{{ asset('home_files/js/venobox.js') }}"></script>
    <script src="{{ asset('home_files/js/slick.js') }}"></script>
    <script src="{{ asset('home_files/js/main.js') }}"></script>

    {{--custom js--}}
    <script src="{{ asset('home_files/js/custom/image_preview.js') }}"></script>
    
    <script>
        $('.counter').counterUp({
            delay: 10,
            time: 4000
        });
    </script>
</body>

</html>