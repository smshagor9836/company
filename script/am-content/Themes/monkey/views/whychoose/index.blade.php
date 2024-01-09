@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="whychosse_breadcrumb">
    <div class="slider-area breadcrumb" id="whychosse_breadcrumb_bg_img" style="background-image: url({{ asset(content('whychosse_breadcrumb','whychosse_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="whychosse_breadcrumb_title">{{ content('whychosse_breadcrumb','whychosse_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="whychosse_breadcrumb_des">{{ content('whychosse_breadcrumb','whychosse_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- service area start -->
<section id="service">
    <div class="service-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="service_title">{{ $title }}</h3>
                        <p id="service_des">{{ $description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-main-area">
            <div class="container">
                <div class="row">
                     @php 
                    $services=array( 
                        'type'=>4,
                        'with'=>'meta',
                        'limit'=>3
                     );
                    @endphp
                    @foreach(LpPosts($services) as $service)
                    <div class="col-lg-4">
                        <div class="single-service">
                            <div class="service-img">
                                <img src="{{ asset($service->meta->preview) }}" alt="">
                            </div>
                            <div class="service-title">
                                <h4>{{ $service->title }}</h4>
                            </div>
                            <div class="service-description">
                                <p>{{ $service->meta->excerpt }}</p>
                            </div>
                            <div class="service-btn">
                                <a href="{{ route('service.show',$service->slug) }}"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service area end -->

@if(Amcoders\Plugin\Plugin::is_active('Testimonials'))
<!-- testimonial area start -->
<section class="test" id="testimonial">
    <div class="testimonial-area pt-150 pb-150" id="review_bg_image" style="background-image: url({{ asset(content('testimonial','review_bg_image')) }});">
        <div class="container">
            <div class="row owl-carousel1 owl-carousel">
                @php
                $testimonials=array(
                    'type'=>5,
                    'with'=>'meta',
                    'translate'=>false
                );
                
                @endphp
               @foreach(LpPosts($testimonials) as $key=>$row)
               @php 
               $meta=json_decode($row->meta->excerpt);
               @endphp
                <div class="col-lg-12">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-review">
                            <p id="testi_first_des">{{ $meta->excerpt }}</p>
                        </div>
                        <div class="testimonal-author-info d-flex">
                            <img id="testi_first_img" src="{{ asset($row->meta->preview) }}" alt="">
                            <div class="author-info">
                                <h3 id="testi_first_name">{{ $row->title }}</h3>
                                <p id="testi_first_name">{{ $meta->company_name }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
                
                
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->
@endif

<!-- quote area start -->
<section id="service_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="service_quote_title">{{ content('service_quote','service_quote_title') }}</h2>
                        <p id="service_quote_description">{{ content('service_quote','service_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="service_quote_button">{{ content('service_quote','service_quote_button') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- quote area end -->
@endsection