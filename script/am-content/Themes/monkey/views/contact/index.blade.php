@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="contact_breadcrumb">
    <div class="slider-area breadcrumb" id="contact_breadcrumb_bg_img" style="background-image: url({{ $bg_img }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="contact_breadcrumb_title">{{ content('contact_breadcrumb','contact_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="contact_breadcrumb_des">{{ content('contact_breadcrumb','contact_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- contact area start -->
<section id="contact">
    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="contact_title">{{ $title }}</h3>
                       	<p id="contact_des">{{ $description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-form">
                        <form action="{{ route('contact') }}" method="POST" id="contact_form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="6" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8 text-center">
                                    <h5 class="text-success pt-15" id="success"></h5>
                                    <h5 class="text-danger" id="error"></h5>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="btn-submit f-right" id="contact_button_label">{{ content('contact','contact_button_label') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact area end -->

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