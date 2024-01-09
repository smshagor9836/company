@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="hero">
    <div class="slider-area" id="hero_image" style="background-image: url({{ content('hero','hero_image') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="slider-info">
                        <h4 id="hero_small_title">{{ content('hero','hero_small_title') }}</h4>
                        <h1 id="hero_main_title">{{ content('hero','hero_main_title') }}</h1>
                        <p id="hero_des">{{ content('hero','hero_des') }}</p>
                        <a id="hero_button_link" href="{{ content('hero','hero_button_link') }}" class="btn"><div id="hero_button">{{ content('hero','hero_button') }}</div></a>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- slider area end -->
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

<!-- experience area start -->
<section id="about">
    <div class="experience-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="experience-info">
                        <h5 id="about_small_title">{{ content('about','about_small_title') }}</h5>
                        <h2 id="about_main_title">{{ content('about','about_main_title') }}</h2>
                        <p id="about_des">{{ content('about','about_des') }}</p>
                        <a id="about_button_link" href="{{ content('about','about_button_link') }}" class="btn"><div id="about_button">{{ content('about','about_button') }}</div></a>
                    </div>
                </div>
                <div class="col-lg-6 ml-auto">
                    <div class="ht-list">
                        <div class="list-item">
                            <a class="link" href="{{ content('about','question_section_one_link','question_section_one') }}">
                                <div class="list-header">
                                    <div class="marker">
                                        01
                                    </div>
                                    <div class="title-wrap">
                                        <h6 class="title" id="question_section_one_title">{{ content('about','question_section_one_title','question_section_one') }}<i class="fas fa-arrow-right f-right"></i></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-item">
                            <a class="link" href="{{ content('about','question_section_two_link','question_section_two') }}">
                                <div class="list-header">
                                    <div class="marker">
                                        02
                                    </div>
                                    <div class="title-wrap">
                                        <h6 class="title" id="question_section_two_title">{{ content('about','question_section_two_title','question_section_two') }} <i class="fas fa-arrow-right f-right"></i></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-item">
                            <a class="link" href="{{ content('about','question_section_three_link','question_section_three') }}">
                                <div class="list-header">
                                    <div class="marker"> 03</div>
                                    <div class="title-wrap">
                                        <h6 class="title" id="question_section_three_title">{{ content('about','question_section_three_title','question_section_three') }} <i class="fas fa-arrow-right f-right"></i></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- experience area end -->

@if(Amcoders\Plugin\Plugin::is_active('services'))
<!-- service area start -->
<section id="service">
    <div class="service-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="service_title">{{ content('service','service_title') }}</h3>
                        <p id="service_des">{{ content('service','service_des') }}</p>
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
                        'limit'=>6
                     );
                    @endphp
                    @foreach(LpPosts($services) as $service)
                    <div class="col-lg-4 mb-30">
                        <div class="single-service">
                            <div class="service-img">
                                <img class="lazy" src="{{ asset($service->meta->preview) }}" alt="">
                            </div>
                            <div class="service-title">
                                <h4>{{ $service->title }}</h4>
                            </div>
                            <div class="service-description">
                                <p>{{ Str::limit($service->meta->excerpt, 200) }}</p>
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
@endif
<!-- counter area start -->
<section id="counter">
    <div class="counter-area pt-100 pb-100" id="counter_img" style="background-image: url({{ asset(content('counter','counter_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-counter d-flex">
                        <div class="counter-img">
                            <img id="counter_first_img" class="lazy" src="{{ asset(content('counter','counter_first_img','counter_first')) }}" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-starting">
                                <h2 id="counter_first_number">{{ content('counter','counter_first_number','counter_first') }}</h2>
                            </div>
                            <div class="counter-des">
                                <span id="counter_first_title">{{ content('counter','counter_first_title','counter_first') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                     <div class="single-counter d-flex">
                        <div class="counter-img">
                            <img id="counter_second_img" class="lazy" src="{{ asset(content('counter','counter_second_img','counter_second')) }}" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-starting">
                                <h2 id="counter_second_number">{{ content('counter','counter_second_number','counter_second') }}</h2>
                            </div>
                            <div class="counter-des">
                                <span id="counter_second_title">{{ content('counter','counter_second_title','counter_second') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                     <div class="single-counter d-flex">
                        <div class="counter-img">
                            <img id="counter_third_img" class="lazy" src="{{ asset(content('counter','counter_third_img','counter_third')) }}" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-starting">
                                <h2 id="counter_third_number">{{ content('counter','counter_third_number','counter_third') }}</h2>
                            </div>
                            <div class="counter-des">
                                <span id="counter_third_title">{{ content('counter','counter_third_title','counter_third') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                     <div class="single-counter d-flex">
                        <div class="counter-img">
                            <img id="counter_four_img" class="lazy" src="{{ asset(content('counter','counter_four_img','counter_four')) }}" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-starting">
                                <h2 id="counter_four_number">{{ content('counter','counter_four_number','counter_four') }}</h2>
                            </div>
                            <div class="counter-des">
                                <span id="counter_four_title">{{ content('counter','counter_four_title','counter_four') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter area end -->

@if(Amcoders\Plugin\Plugin::is_active('Team'))
<!-- team area start -->
<section id="team">
    <div class="team-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="team_title">{{ content('team','team_title') }}</h3>
                        <p id="team_des">{{ content('team','team_des') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row owl-carousel team">
                @php
                $team=array(
                    'type'=>6,
                    'with'=>'meta',
                    'translate'=>false
                );
                
                @endphp
               @foreach(LpPosts($team) as $key=>$row)
               
                <div class="col-lg-12">
                    <div class="single-team">
                        <div class="team-member-img">
                            <img class="img-fluid lazy" id="team_first_img" src="{{ asset($row->meta->preview) }}" alt="">
                        </div>
                        @php 
                        $socials=json_decode($row->meta->excerpt);
                        @endphp

                        @if(!empty($socials))
                        <div class="social-details text-center">
                            <div class="social-links">
                                <nav>
                                    <ul>
                                        @foreach($socials as $key=>$social)
                                        <li><a id="team_first_fb" href="{{ $social }}"><i class="{{ $key }}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        @endif
                        <div class="team-details text-center">
                            <h5 id="team_first_name">{{ $row->title }}</h5>
                            <span id="team_first_position">{{ $row->slug }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- team area end -->
@endif
@if(Amcoders\Plugin\Plugin::is_active('ecommerce'))
<!-- pricing area start -->
<section id="pricing">
    <div class="pricing-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="pricing_title">{{ content('pricing','pricing_title') }}</h3>
                        <p id="pricing_des">{{ content('pricing','pricing_des') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-main-area">
            <div class="container">
                <div class="row">
                    @php 
                    $ecom_settings=LpOption('ecommerce');
                    @endphp
                    @foreach($pricings as $pricing)
                    <div class="col-lg-4">
                        <div class="single-pricing text-center">
                            <div class="pricing-header">
                                <h3>{{ $pricing->title }}</h3>
                            </div>
                            <div class="pricing-price-per-month">
                                <h2><i class="{{ $ecom_settings->icon }}"></i>{{ $pricing->productMeta->s_price }}</h2>
                                @php 
                                $main_data = json_decode($pricing->meta->excerpt);
                                @endphp
                                <span>{{ $main_data->duration }}</span>
                            </div>
                            <div class="pricing-menu">
                                <nav>
                                    <ul>
                                        @foreach($main_data->service as $service)
                                        <li>{{ $service }}</li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <div class="pricing-btn">
                                @if(empty($main_data->link))
                                @php 
                                $p_link=route('product.cart.pricingstore',$pricing->id);
                                @endphp
                                @else
                                 @php 
                                $p_link=$main_data->link;
                                @endphp
                                @endif
                                <a href="{{ $p_link }}">{{ __('Order Now') }}</a>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <input type="hidden" id="add_to_cart" value="{{ route('product.cart.store') }}">
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- pricing area end -->
@if(Amcoders\Plugin\Plugin::is_active('Testimonials'))
<!-- testimonial area start -->
<section class="test pt-100" id="testimonial">
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
                            <img id="testi_first_img" class="lazy" src="{{ asset($row->meta->preview) }}" alt="">
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
<!-- blog area start -->
<section id="blog">
    <div class="blog-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="blog_title">{{ content('blog','blog_title') }}</h3>
                        <p id="blog_des">{{ content('blog','blog_des') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-main-area">
            <div class="container">
                <div class="row">
                   @php
                $blogs=array(
                    'type'=>0,
                    'with'=>'meta',
                    'limit'=>3,

                );
                
                @endphp
               @foreach(LpPosts($blogs) as $key=>$row)
                    <div class="col-lg-4">
                        <div class="single-blog">
                            <a href="{{ route('blog.show',$row->slug) }}"><img class="img-fluid lazy" src="{{ asset($row->meta->preview) }}" alt=""></a>
                            <div class="blog-info">
                                <div class="blog-title">
                                    <a href="{{ route('blog.show',$row->slug) }}">
                                        <h4>{{ $row->title }}</h4>
                                    </a>
                                </div>
                                <div class="blog-created-date">
                                    <i class="far fa-calendar-times"></i> <span> {{ $row->created_at->isoFormat('LL') }}</span>
                                </div>
                                <div class="blog-details">
                                    <p>{{ $row->meta->excerpt }}</p>
                                </div>
                                <div class="blog-action">
                                    <a href="{{ route('blog.show',$row->slug) }}">{{ __('Read More') }} <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog area end -->
@endsection