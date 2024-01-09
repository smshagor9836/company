@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="checkout_breadcrumb">
	<div class="slider-area breadcrumb" id="checkout_breadcrumb_bg_img" style="background-image: url({{ asset(content('checkout_breadcrumb','checkout_breadcrumb_bg_img')) }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-area text-center">
						<h3 id="checkout_breadcrumb_title">{{ content('checkout_breadcrumb','checkout_breadcrumb_title') }}</h3>
						<div class="breadcrump-title">
							<span id="checkout_breadcrumb_des">{{ content('checkout_breadcrumb','checkout_breadcrumb_des') }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- slider area end -->
<input type="hidden" id="stripe_key" value="{{ env('STRIPE_KEY') }}">
<form action="{{ route('checkout.store') }}" method="post" {{-- id="payment-form" --}}>
	@csrf
	<!-- checkout area start -->
	<section>
		<div class="checkout-area pt-100 pb-100" id="checkout">
			<div class="container">
				<div class="row mt-30">
					<div class="col-lg-7">
						<div class="biling-information">
							<h3 id="billing_title">{{ content('checkout','billing_title') }}</h3>
						</div>
						<div class="custom-checkout-form">
							<div class="row">
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<label for="first_name">{{ __('Name') }}</label>
										<input type="text" class="form-control" id="first_name" name="name" required="" value="{{ Auth::user()->name ?? '' }}">
									</div>
								</div>
								
								<div class="col-lg-6 mb-10">
									<div class="form-group">
										<label for="phone">{{ __('Phone') }}</label>
										<input type="text" class="form-control" id="phone" name="phone" required="">
									</div>
								</div>
								<div class="col-lg-6 mb-10">
									<div class="form-group">
										<label for="email">{{ __('Email') }}</label>
										<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" required="">
									</div>
								</div>
								
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<label for="street">{{ __('Street address') }}</label>
										<input type="text" class="form-control" id="street" placeholder="House number and street name" name="street_address_1">
									</div>
								</div>
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<input type="text" class="form-control" id="street" placeholder="Apartment, suite, unit etc. (optional)" name="street_address_2">
									</div>
								</div>
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<label for="city">{{ __('Town / City') }}</label>
										<input type="text" class="form-control" id="city" name="city">
									</div>
								</div>
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<label for="state">{{ __('State') }} </label>
										<input type="text" class="form-control" id="state" name="state">
									</div>
								</div>
								
								<div class="col-lg-12 mb-10">
									<div class="form-group">
										<label for="note">{{ __('Order Note') }}</label>
										<textarea class="form-control" id="note" cols="30" rows="5" placeholder="Notes about your order, e.g. special notes for delivery." name="note"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="biling-information">
							<h3 id="order_title">{{ content('checkout','order_title') }}</h3>
						</div>
						@php 
						$ecom_settings=LpOption('ecommerce');
						
						@endphp
						<div class="order_table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>{{ __('Product') }}</th>
										<th>{{ __('Total') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach(Cart::content() as $cart)
									<tr>
										<td> {{ $cart->name }} <strong> × {{ $cart->qty }}</strong></td>
										<td> <i class="{{ $ecom_settings->icon }}"></i>{{ $cart->total }}</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>{{ __('Cart Subtotal') }}</th>
										<td><strong><i class="{{ $ecom_settings->icon }}"></i>{{ Cart::Subtotal() }}</strong></td>
									</tr>
									<tr>
										<th>{{ __('Tax') }}</th>
										<td><strong><i class="{{ $ecom_settings->icon }}"></i>{{ Cart::tax() }}</strong></td>
									</tr>
									<tr>
										<th>{{ __('Shipping') }}</th>
										<td><strong><i class="{{ $ecom_settings->icon }}"></i>{{ $ecom_settings->shipping }}</strong></td>
									</tr>
									<tr class="order_total">
										<th>{{ __('Order Total') }}</th>
										@php
	
										$str=str_replace(',', '', Cart::total());
										@endphp
										<td><strong><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($str+$ecom_settings->shipping,2) }}</strong></td>
										<input type="hidden" name="amount" value="{{ Cart::total() }}">
										<input type="hidden" name="tax" value="{{ Cart::tax() }}">
										<input type="hidden" name="currency" value="{{ $ecom_settings->currency }}">
										<input type="hidden" name="discount" value="0">
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="order_button mt-3">
							<button type="submit" class="btn-custom" id="order_button_name">{{ content('checkout','order_button_name') }}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout area end -->
</form>

<!-- quote area start -->
<section id="checkout_quote">
	<div class="quote-area pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="quote-info text-center">
						<h2 id="checkout_quote_title">{{ content('checkout_quote','checkout_quote_title') }}</h2>
						<p id="checkout_quote_description">{{ content('checkout_quote','checkout_quote_description') }}</p>
						<a href="{{ url('contact') }}" id="checkout_quote_button">{{ content('checkout_quote','checkout_quote_button') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- quote area end -->


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
