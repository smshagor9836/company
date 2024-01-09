@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="cart_breadcrumb">
    <div class="slider-area breadcrumb" id="cart_breadcrumb_bg_img" style="background-image: url({{ asset(content('cart_breadcrumb','cart_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="cart_breadcrumb_title">{{ content('cart_breadcrumb','cart_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="cart_breadcrumb_des">{{ content('cart_breadcrumb','cart_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

@if(Cart::count() > 0)
<!-- cart area start -->
<section>
	<div class="cart-area pt-100 pb-100" id="cart">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cart-title">
						<h3 id="cart_title">{{ content('cart','cart_title') }}</h3>
					</div>
				</div>
			</div>
			<div class="row pt-20">
				<div class="col-lg-12">
					<div class="cart-table table-responsive">
						<table class="table table-bordered">
							<thead class="text-center">
								<tr>
									<th class="pro-remove"></th>
									<th class="pro-thumbnail">{{ __('Image') }}</th>
									<th class="pro-title">{{ __('Product') }}</th>
									<th class="pro-price">{{ __('Price') }}</th>
									<th class="pro-quantity">{{ __('Quantity') }}</th>
									<th class="pro-subtotal">{{ __('Total') }}</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<input type="hidden" id="remove_cart" value="{{ route('product.cart.remove') }}">
								<input type="hidden" id="cart_update" value="{{ route('product.cart.update') }}">
								@php 
							$ecom_settings=LpOption('ecommerce');
							@endphp
								@foreach(Cart::content() as $cart)
								<tr>
									<td class="pro-remove">
										<a href="javascript:void(0)" onclick="remove_cart('{{ $cart->rowId }}')"><i class="far fa-trash-alt"></i></a>
									</td>
									<td class="pro-thumbnail">
										<a href="#">
											<img src="{{ asset(App\Meta::where('term_id',$cart->id)->first()->preview) }}" alt="">
										</a>
									</td>
									<td class="pro-title">
										<a href="#">{{ $cart->name }}</a>
									</td>
									<td class="pro-price">
										<span><i class="{{ $ecom_settings->icon }}"></i>{{ $cart->price }}</span>
									</td>
									<td class="pro-quantity">
										<div class="pro-qty">
											<div class="count-input-block">
												<input type="number" min="1" id="product_qty{{ $cart->rowId }}" onchange="cart_update('{{ $cart->rowId }}')" class="form-control text-center" value="{{ $cart->qty }}">
											</div>
										</div>
									</td>
									<td class="pro-subtotal"><span><i class="{{ $ecom_settings->icon }}"></i>{{ $cart->total }}</span></td>
								</tr>
								@endforeach
								<tr>
									<td class="pro-total-title" colspan="5">Total Price</td>
									<td class="pro-total-price"><i class="{{ $ecom_settings->icon }}"></i>{{ Cart::total() }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="cart-link f-right mt-4">
						<a href="{{ url('shop') }}" class="btn-custom mr-3 shopping" id="cart_shopping_title">{{ content('cart','cart_shopping_title') }}</a>
						<a href="{{ url('checkout') }}" class="btn-custom" id="checkout_title">{{ content('cart','checkout_title') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- cart area end -->
@else
<div class="cart-not-found text-center pt-100 pb-100">
	<h2>Cart Not Found</h2>
</div>
@endif

<!-- quote area start -->
<section id="cart_quote">
    <div class="quote-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="cart_quote_title">{{ content('cart_quote','cart_quote_title') }}</h2>
                        <p id="cart_quote_description">{{ content('cart_quote','cart_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="cart_quote_button">{{ content('cart_quote','cart_quote_button') }}</a>
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

@push('js')
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
</script>
@endpush