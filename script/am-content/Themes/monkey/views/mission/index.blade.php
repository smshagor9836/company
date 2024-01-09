@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="mission_breadcrumb">
    <div class="slider-area breadcrumb" id="mission_breadcrumb_bg_img" style="background-image: url({{ asset(content('mission_breadcrumb','mission_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="mission_breadcrumb_title">{{ content('mission_breadcrumb','mission_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="mission_breadcrumb_des">{{ content('mission_breadcrumb','mission_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- mission area start -->
<section>
    <div class="mission-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30" id="mission">
                    <div class="single-mission-img">
                        <img class="img-fluid" id="mission_img" src="{{ $bg_img }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-mission">
                        <h3 id="mission_title">{{ $title }}</h3>
                        <p id="mission_des">{{ $description }}</p>
                    </div>
                </div>
            </div>
            <div class="row pt-100">
                <div class="col-lg-6 mb-30" id="mission_values">
                    <div class="single-mission">
                        <h3 id="mission_values_title">{{ content('mission_values','mission_values_title') }}</h3>
                        <p id="mission_values_des">{{ content('mission_values','mission_values_des') }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-mission-img">
                        <img id="mission_values_img" class="img-fluid" src="{{ asset(content('mission_values','mission_values_img')) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mission area end -->

<!-- quote area start -->
<section id="mission_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="mission_quote_title">{{ content('mission_quote','mission_quote_title') }}</h2>
                        <p id="mission_quote_description">{{ content('mission_quote','mission_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="mission_quote_button">{{ content('mission_quote','mission_quote_button') }}</a>
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