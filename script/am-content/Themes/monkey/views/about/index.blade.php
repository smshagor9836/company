@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="breadcrumb">
    <div class="slider-area breadcrumb" id="breadcrumb_bg_img" style="background-image: url({{ asset(content('breadcrumb','breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="breadcrumb_title">{{ content('breadcrumb','breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="breadcrumb_des">{{ content('breadcrumb','breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- about area start -->
<section id="about_ex">
    <div class="about-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-about text-center">
                        <div class="about-img">
                            <img id="about_ex_first_img" src="{{ asset(content('about_ex','about_ex_first_img','about_ex_first')) }}" alt="">
                        </div>
                        <div class="about-total">
                            <span id="about_ex_first_num">{{ content('about_ex','about_ex_first_num','about_ex_first') }}</span>
                        </div>
                        <div class="about-title">
                            <h5 id="about_ex_first_title">{{ content('about_ex','about_ex_first_title','about_ex_first') }}</h5>
                        </div>
                        <div class="about-des">
                            <p id="about_ex_first_des">{{ content('about_ex','about_ex_first_des','about_ex_first') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-about text-center">
                        <div class="about-img">
                            <img id="about_ex_second_img" src="{{ asset(content('about_ex','about_ex_second_img','about_ex_second')) }}" alt="">
                        </div>
                        <div class="about-total">
                            <span id="about_ex_second_num">{{ content('about_ex','about_ex_second_num','about_ex_second') }}</span>
                        </div>
                        <div class="about-title">
                            <h5 id="about_ex_second_title">{{ content('about_ex','about_ex_second_title','about_ex_second') }}</h5>
                        </div>
                        <div class="about-des">
                            <p id="about_ex_second_des">{{ content('about_ex','about_ex_second_des','about_ex_second') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-about text-center">
                        <div class="about-img">
                            <img id="about_ex_third_img" src="{{ asset(content('about_ex','about_ex_third_img','about_ex_third')) }}" alt="">
                        </div>
                        <div class="about-total">
                            <span id="about_ex_third_num">{{ content('about_ex','about_ex_third_num','about_ex_third') }}</span>
                        </div>
                        <div class="about-title">
                            <h5 id="about_ex_third_title">{{ content('about_ex','about_ex_third_title','about_ex_third') }}</h5>
                        </div>
                        <div class="about-des">
                            <p id="about_ex_third_des">{{ content('about_ex','about_ex_third_des','about_ex_third') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area end -->

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

<!-- counter area start -->
<section id="counter">
    <div class="counter-area pt-100 pb-100" id="counter_img" style="background-image: url({{ asset(content('counter','counter_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-counter d-flex">
                        <div class="counter-img">
                            <img id="counter_first_img" src="{{ asset(content('counter','counter_first_img','counter_first')) }}" alt="">
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
                            <img id="counter_second_img" src="{{ asset(content('counter','counter_second_img','counter_second')) }}" alt="">
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
                            <img id="counter_third_img" src="{{ asset(content('counter','counter_third_img','counter_third')) }}" alt="">
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
                            <img id="counter_four_img" src="{{ asset(content('counter','counter_four_img','counter_four')) }}" alt="">
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

<!-- quote area start -->
<section id="quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="quote_title">{{ content('quote','quote_title') }}</h2>
                        <p id="quote_description">{{ content('quote','quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="quote_button">{{ content('quote','quote_button') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- quote area end -->

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

@endsection