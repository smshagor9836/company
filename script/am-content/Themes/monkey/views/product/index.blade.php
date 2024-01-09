@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="shop_breadcrumb">
    <div class="slider-area breadcrumb" id="shop_breadcrumb_bg_img" style="background-image: url({{ $bg_img }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="shop_breadcrumb_title">{{ $title }}</h3>
                        <div class="breadcrump-title">
                            <span id="shop_breadcrumb_des">{{ content('shop_breadcrumb','shop_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->


<!-- shop area start -->
<div class="shop-area pt-100">
    <div class="container">
       @php 
       $ecom_settings=LpOption('ecommerce');
       @endphp
       <div class="row products-row">

           @foreach($products as $product)
           <div class="col-lg-4 mb-30 produ">
            <div class="single-product">

                <div class="product-img">
                    <a href="{{ route('product.show',$product->slug) }}"><img class="img-fluid" src="{{ asset($product->meta->preview) }}" alt=""></a>
                </div>
                <div class="product-category">
                    <span>{{ $product->categories->first()->name }}</span>
                </div>
                <div class="product-name">
                    <h3><a href="{{ route('product.show',$product->slug) }}">{{ $product->title }}</a></h3>
                </div>
                <div class="product-price">
                    <span><strong>Price:</strong> <i class="{{ $ecom_settings->icon }}"></i>{{ $product->productMeta->s_price }}</span>
                </div>
                <input type="hidden" name="qty" id="product_qty{{ $product->id }}" value="1">
                <div class="product-action">
                    <a href="javascript:void(0)" onclick="add_to_cart({{ $product->id }})" class="add-to-card"><i class="fas fa-cart-plus"></i> cart</a>

                </div>
            </div>
        </div>
        @endforeach

    </div>
    <input type="hidden" id="add_to_cart" value="{{ route('product.cart.store') }}">
   
</div>
</div>
<!-- shop area end -->

<!-- quote area start -->
<section id="shop_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="shop_quote_title">{{ content('shop_quote','shop_quote_title') }}</h2>
                        <p id="shop_quote_description">{{ content('shop_quote','shop_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="shop_quote_button">{{ content('shop_quote','shop_quote_button') }}</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/3.0.6/infinite-scroll.pkgd.min.js"></script>
<script src="{{ theme_asset('monkey/public/js/products.js') }}"></script>

@endpush