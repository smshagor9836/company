@php
$basic_info=LpOption('system_basic_info');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	{!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($basic_info->favicon) }}">

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	


	<link rel="stylesheet" href="{{ theme_asset('portfolio/public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('portfolio/public/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('portfolio/public/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('portfolio/public/css/style.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('portfolio/public/css/responsive.css') }}">

</head>

<body>
	<div class="content">

		<!--Preloader Area Start-->
		<div class="preloader">
			<div class="spinner"></div>
		</div>
		<!--Preloader Area End-->


		<!--Header Area Start-->
		@include('theme::layouts.partials.header')
		<!--Header Area End-->

		@yield('content')

		<!--Footer Area Start-->
		@include('theme::layouts.partials.footer')
		<!--Footer Area End-->
		<a href="#portfolio_header" class="back-top btn-fill"><i class="fas fa-angle-up"></i></a>
	</div>

	<script src="{{ theme_asset('portfolio/public/js/jQuery-v3.3.1.min.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/bootstrap.min.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/owl.carousel.min.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/jquery.lazyload.min.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/jquery.animateTyping.js') }}"></script>
	<script src="{{ theme_asset('portfolio/public/js/main.js') }}"></script>

	@if(isset($basic_info))

	@if(!empty($basic_info->propertyid))
	<?php echo Livechat($basic_info->propertyid); ?>
	@endif
	@endif
</body>

</html>
