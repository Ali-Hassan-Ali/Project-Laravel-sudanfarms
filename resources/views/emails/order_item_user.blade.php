{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('home.farms_of_sudan') | @lang('dashboard.orders')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/svg" href="{{ asset('home_files/image/LOG.png') }}">

    <link rel="stylesheet" href="{{ asset('home_files/css/vendor/bootstrap.min.css') }}">

</head>

<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Pre-header for the newsletter template
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
        <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;">
                                            <img width="100" border="0" style="display: block; width: 100px;" src="{{ asset('home_files/image/logo.svg') }}" alt="" /></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <table width="360 " border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590 hide">
                                            <tr>
                                                <td width="120" align="center" style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href="{{ route('offers.clients.index') }}" style="color: #312c32; text-decoration: none;">@lang('dashboard.offers')</a>
                                                </td>
                                                <td width="120" align="center" style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href="{{ route('common_questions.index') }}" style="color: #312c32; text-decoration: none;">@lang('dashboard.common_questions')</a>
                                                </td>
                                                <td width="120" align="center" style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href="{{ route('home.contact') }}" style="color: #312c32; text-decoration: none;">@lang('dashboard.contacts')</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <!-- big image section -->
                        
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

                        <tr>
                            <td align="center">
                                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        @php
                                            $banner = App\Models\SettingBanner::first();
                                        @endphp
                                        <td align="center" class="section-img">
                                            <a href="" style=" border-style: none !important; display: block; border: 0 !important;">
                                                <img src="{{ $banner->image_path }}" 
                                                style="display: block; width: 590px;" width="590" border="0" alt="" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                                <tr>
                                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                                <tr>
                                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">


                                                        <div style="line-height: 24px">
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                                        <div style="line-height: 26px;">
                                                            <a href="{{ route('shops.index') }}" style="color: #ffffff; text-decoration: none;">@lang('dashboard.shop')</a>
                                                        </div>
                                                    </td>
                                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                                        <div style="line-height: 26px;">
                                                            <a href="{{ route('offers.clients.index') }}" style="color: #ffffff; text-decoration: none;">@lang('dashboard.offers')</a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>


                                </table>

                            </td>
                        </tr>

                        <tr class="hide">
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
                        </tr>

                    </table>
                    <!-- end section -->

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->


    @foreach ($orderItems as $item)
    <!--  50% image -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">


                                <tr> 
                                    <td align="center">
                                        <a href="{{ route('product.show',$item->id) }}" style=" border-style: none !important; border: 0 !important;">
                                            <img src="{{ $item->image_path }}" 
                                            style="display: block; width: 280px;" width="280" border="0" /></a>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" width="5" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td width="5" height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" width="260" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #3d3d3d; font-size: 22px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                        class="align-center main-header">


                                        <div style="line-height: 35px">

                                            {{ $item->name }}

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left">
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" class="container590">
                                            <tr>
                                                <td align="center">
                                                    <table align="center" width="40" border="0" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                                        <tr>
                                                            <td height="2" style="font-size: 2px; line-height: 2px;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;"
                                        class="align-center">


                                        <div style="line-height: 24px">

                                            {{ $item->description }}

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left">
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" class="container590">
                                            <tr>
                                                <td align="center">
                                                    <table border="0" align="center" width="120" cellpadding="0" cellspacing="0" style="border: 1px solid #eeeeee; ">

                                                        <tr>
                                                            <td height="5" style="font-size: 5px; line-height: 5px;">&nbsp;</td>
                                                        </tr>

                                                        <tr>
                                                            <td align="center" style="color: #5caad2; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 20px;">


                                                                <div style="line-height: 20px;">
                                                                    <a href="{{ route('shops.index') }}" style="color: #5caad2; text-decoration: none;">
                                                                        @lang('dashboard.shops')
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="8" style="font-size: 8px; line-height: 8px;">&nbsp;</td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end section -->
    @endforeach

    {{-- js vendor --}}
    <script src="{{ asset('home_files/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('home_files/js/vendor/bootstrap.min.js') }}"></script>

</body>

</html> --}}