@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="shop_breadcrumb">
    <div class="slider-area breadcrumb" id="shop_breadcrumb_bg_img" style="background-image: url({{ asset(content('shop_breadcrumb','shop_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="shop_breadcrumb_title">{{ content('shop_breadcrumb','shop_breadcrumb_title') }}</h3>
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
@php 
$ecom_settings=LpOption('ecommerce');
@endphp
<!-- product details area start -->
<div class="product-details pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="main-image">
                    <a href="#"><img class="img-fluid" src="{{ asset($product->meta->preview) }}" alt=""></a>
                </div>
                @php 
                $gallery = explode( ',', $product->meta->gallery );
                @endphp
                <div class="multi-img d-flex">
                    @foreach($gallery as $key=> $img)
                    <img class="{{ $product->meta->preview == $img  ? 'active' : '' }}" src="{{ asset($img) }}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product-details-info">
                    <div class="product-name">
                        <h3>{{ $product->title }}</h3>
                    </div>
                    <div class="product-price">
                        <span><i class="{{ $ecom_settings->icon ?? '' }}"></i>{{ $product->productMeta->s_price }}</span><span><del><i class="{{ $ecom_settings->icon ?? '' }}"></i>{{ $product->productMeta->p_price }}</del></span>
                    </div>
                    <div class="product-des">
                        <p>{{ $product->meta->excerpt }}</p>
                    </div>
                    <div class="product-qty">
                        <input type="number" min="1" id="product_qty{{ $product->id }}" value="1">
                    </div>
                    <input type="hidden" id="add_to_cart" value="{{ route('product.cart.store') }}">
                    <input type="hidden" id="wishlist_url" value="{{ route('product.wishlist.store') }}">
                    <input type="hidden" id="compare_url" value="{{ route('product.compare.store') }}">
                    <div class="product-action">
                        <a href="javascript:void(0)" class="add-to-card" onclick="add_to_cart({{ $product->id }})">{{ __('Add To Cart') }}</a>
                     
                    </div>
                </div>
            </div>
        </div>
        @php 
        $content = json_decode($product->post->content);
        @endphp
        <div class="row pt-50">
            <div class="col-lg-12">
                <div class="product-info-list">
                    <ul class="nav nav-tabs mb-10">
                        <li><a data-toggle="tab" class="active" href="#description">{{ __('Description') }}</a></li>
                        <li><a data-toggle="tab" href="#information">{{ __('Information') }}</a></li>
                    </ul>
                    <div class="product-info-tab">
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active show">
                                <div class="product-des-tab-content">
                                    <p><?php echo $content->content; ?></p>
                                </div>
                            </div>
                            <div id="information" class="tab-pane fade">
                                <p>{{ $content->information }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details area end -->

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
<input type="hidden" id="post_id" value="{{ $product->id }}">

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
<input type="hidden" id="count_url" value="{{ route('post.view') }}">
<input type="hidden" id="post_id" value="{{ $product->id }}">
@endsection