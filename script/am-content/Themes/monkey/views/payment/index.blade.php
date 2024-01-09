@extends('theme::layouts.app')

@section('content')
@php 
$total_am= str_replace(',','',$data->amount);
@endphp
<!-- slider area start -->
<section id="service_breadcrumb">
	<div class="slider-area breadcrumb" id="service_breadcrumb_bg_img" style="background-image: url({{ asset(content('hero','hero_image')) }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-area text-center">
						<h3 id="service_breadcrumb_title">{{ __('Select Payment') }}</h3>
						<div class="breadcrump-title">
							<span id="service_breadcrumb_des">{{ __('Home') }} / {{ __('Select Payment') }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- slider area end -->

<!-- select payment area start -->
<div class="select-payment pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="select-payment-content text-center">
					<h3>{{ __('Select Payment Method') }}</h3>
					<div class="payment-main-content">
						<div class="row">
							@if(!empty(env('STRIPE_KEY')))

							<div class="col-lg-6">
								<a href="#" data-toggle="modal" data-target="#stripe_modal"><img src="{{ theme_asset('monkey/public/img/stripe.png') }}"></a>
							</div>
							@endif
							@if(!empty(env('PAYPAL_CLIENT_ID')))
							<div class="col-lg-6">
								<div id="paypal-button"></div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- select payment area end -->

{{-- modal --}}
<div class="modal fade" id="stripe_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title modal-stripe" id="exampleModalLabel">{{ __('Card Information') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('payment.store') }}" id="payment-form" method="POST">
					@csrf
					@php 
					$value = json_decode($data->oder_data);
					$ecom_settings=LpOption('ecommerce');
					@endphp
				
					<input type="hidden" name="amount" value="{{ $total_am+$ecom_settings->shipping }}">
					<input type="hidden" name="currency" value="{{ $value->currency }}">
					<input type="hidden" name="email" value="{{ $value->email }}">
					<input type="hidden" name="order_id" value="{{ $data->id }}">
					<input type="hidden" name="method" value="stripe">
					<div class="payment_method">
						<div class="panel-default">
							<label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult"></label>
							<div id="collapsedefult" class="collapse one show" data-parent="#accordion">
								<div class="card-body1">
									<script src="https://js.stripe.com/v3/"></script>        
									<div class="">
										<div class="card-name">
											<input type="text" name="name_on_card" id="name_on_card" placeholder="Name on Card">
										</div>
										<div id="card-element">
											<!-- A Stripe Element will be inserted here. -->
										</div>

										<!-- Used to display form errors. -->
										<div id="card-errors" role="alert"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="order_button mt-3">
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
					<button type="submit" class="btn btn-secondary" id="order_button_name">{{ content('checkout','order_button_name') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
<input type="hidden" id="stripe_key" value="{{ env('STRIPE_KEY') }}">

@endsection

@push('js')
<script src="{{ theme_asset('monkey/public/js/stripe.js') }}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
	paypal.Button.render({
    // Configure environment
    env: 'production',
    client: {
    	//sandbox: '{{ env('PAYPAL_CLIENT_ID') }}',
    	production: '{{ env('PAYPAL_CLIENT_ID') }}'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    	size: 'medium',
    	color: 'gold',
    	shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,


    // Set up a payment
    payment: function(data, actions) {
    	return actions.payment.create({
    		transactions: [{
    			amount: {
    				total: '{{ $total_am+$ecom_settings->shipping }}',
    				currency: '{{ $value->currency }}'
    			}
    		}]
    	});
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
    	return actions.payment.execute().then(function() {
        // // Show a confirmation message to the buyer
        // window.alert(window.location.origin);
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var order_id = '{{ $data->id }}';
        $.ajax({
			type: 'POST',
			url: '{{ route('payment.store') }}',
			data: {method: 'paypal',order_id: order_id },
			dataType: 'html',
			contentType: false,
			cache: false,
			processData:false,
			success: function(response){ 
				window.history.pushState('', '', '{{ route('orderconfirm') }}');
        		location.reload();
			}
		})
        
    });
    }
}, '#paypal-button');

</script>
 <script>
//
$("body").on("contextmenu",function(e){
return false;
});
$(document).keydown(function(e){
if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)){
return false;
}
if(e.which === 123){
return false;
}
if(e.metaKey){
return false;
}
//document.onkeydown = function(e) {
// "I" key
if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
return false;
}
// "J" key
if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
return false;
}
// "S" key + macOS
if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
return false;
}
if (e.keyCode == 224 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
return false;
}
// "U" key
if (e.ctrlKey && e.keyCode == 85) {
return false;
}
// "F12" key
if (event.keyCode == 123) {
return false;
}
});
</script> 
@endpush