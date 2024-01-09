@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="faq_breadcrumb">
    <div class="slider-area breadcrumb" id="faq_breadcrumb_bg_img" style="background-image: url({{ asset(content('faq_breadcrumb','faq_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="faq_breadcrumb_title">{{ content('faq_breadcrumb','faq_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="faq_breadcrumb_des">{{ content('faq_breadcrumb','faq_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- faq area start -->
<section id="faq">
    <div class="faq-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="faq_title">{{ $title }}</h3>
                        <p id="faq_des">{{ $description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="faq-card">
                        <div class="accordion" id="accordionExample">

                            @php
                            $i=0;

                            @endphp
                           @foreach($data->faq as $key => $row)
                           @php
                            $i++;
                            @endphp
                            <div class="card">
                                <div class="card-header" id="headingOne{{ $i }}">
                                    <h2 class="mb-0">
                                        <a type="button" data-toggle="collapse" data-target="#collapseOne{{ $i }}" aria-expanded="true" aria-controls="collapseOne" >
                                            {{ $key }}
                                        </a>
                                    </h2>
                                </div>

                                <div id="collapseOne{{ $i }}" class="collapse" aria-labelledby="headingOne{{ $i }}" data-parent="#accordionExample">
                                    <div class="card-body" >
                                       {{ $row }}
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img id="faq_img" class="img-fluid" src="{{ asset($data->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq area end -->
<!-- quote area start -->
<section id="faq_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="faq_quote_title">{{ content('faq_quote','faq_quote_title') }}</h2>
                        <p id="faq_quote_description">{{ content('faq_quote','faq_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="faq_quote_button">{{ content('faq_quote','faq_quote_button') }}</a>
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