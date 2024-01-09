@php
$basic_info=LpOption('system_basic_info');
@endphp
<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($basic_info->favicon) }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/font.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/default.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/style.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('monkey/public/css/responsive.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
       
        <!-- header area start -->
        @include('theme::layouts.partials.header',['basic_info'=>$basic_info])
        <!-- header area end -->

        @yield('content')

        <!-- footer area start -->
        @include('theme::layouts.partials.footer',['basic_info'=>$basic_info])
        <!-- footer area end -->

        <!-- JS here -->
        
        <script src="{{ theme_asset('monkey/public/js/vendor/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/popper.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/bootstrap.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/owl.carousel.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ theme_asset('monkey/public/js/main.js') }}"></script>
        @stack('js')
        
        @if(isset($basic_info))

        @if(!empty($basic_info->propertyid))
        <?php echo Livechat($basic_info->propertyid); ?>
        @endif
        @endif
    </body>

    </html>