@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="whychosse_breadcrumb">
    <div class="slider-area breadcrumb" id="whychosse_breadcrumb_bg_img" style="background-image: url({{ asset(content('whychosse_breadcrumb','whychosse_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="whychosse_breadcrumb_title">{{ __('Order Confirmation') }}</h3>
                        <div class="breadcrump-title">
                            <span id="whychosse_breadcrumb_des">Home / {{ __('Order Confirmation') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<div class="order-confirm pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="confirm-content text-center">
					<div class="order-confirm-icon">
						<i class="fas fa-check-circle"></i>
					</div>
					<h2>{{ __('Your Order is Confirmed') }}</h2>
					<p>{{ __('We will contact with you as soon as possible.') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- band area start -->
@php
$basic_info=LpOption('system_basic_info');

@endphp
@if(!empty($basic_info->gallary_input))
@php
$gallery=explode(',', $basic_info->gallary_input);

@endphp
<!-- band area start -->
<section id="band">
    <div class="band-area pt-100 pb-100">
        <div class="container">
            <div class="row owl-carousel2 owl-carousel">


                @foreach($gallery as $row)
                <div class="col-lg-12">
                    <div class="band-img">
                     <img id="band_first_img" src="{{ asset($row) }}" alt="">
                 </div>
             </div>
             @endforeach

         </div>
     </div>
 </div>
</section>
@endif
<!-- band area end -->
@endsection