@php
$row=App\Options::where('key','system_basic_info')->first();     
$siteInfo=json_decode($row->value);   
                     
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($siteInfo->favicon ?? '') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customaizer/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    
    @yield('style')
   
</head>

<body>

    <div class="loading"></div>
    <!--**********************************
        Header start
        ***********************************-->
        @include('layouts/backend/partials/header')
    <!--**********************************
        Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
        Sidebar start
        ***********************************-->
        @include('layouts/backend/partials/sidebar')
        <div class="main-content-area">
            <div class="container-fluid">
               @yield('content')
           </div>
       </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
        
<script src="{{ asset('admin/js/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.min.js') }}"></script>
        
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
@yield('script')
</body>

</html>