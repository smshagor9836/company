@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="team_breadcrumb">
    <div class="slider-area breadcrumb" id="team_breadcrumb_bg_img" style="background-image: url({{ $bg_img }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="team_breadcrumb_title">{{ content('team_breadcrumb','team_breadcrumb_title') }}</h3>
                        <div class="breadcrump-title">
                            <span id="team_breadcrumb_des">{{ content('team_breadcrumb','team_breadcrumb_des') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->


<!-- team area start -->
<section id="expert">
    <div class="expert-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-header-title text-center pb-30">
                        <h3 id="team_title">{{ $title }}</h3>
                        <p id="team_des">{{ $description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if(Amcoders\Plugin\Plugin::is_active('Team'))
                @php
                $team=array(
                    'type'=>6,
                    'with'=>'meta',
                    'translate'=>false
                );
                @endphp
               @foreach(LpPosts($team) as $key=>$row)
                <div class="col-lg-3">
                    <div class="single-team">
                        <div class="team-member-img">
                            <img class="img-fluid" id="team_first_img" src="{{ asset($row->meta->preview) }}" alt="">
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
                @endif
            </div>
        </div>
    </div>
</section>
<!-- team area end -->

<!-- quote area start -->
<section id="team_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="team_quote_title">{{ content('team_quote','team_quote_title') }}</h2>
                        <p id="team_quote_description">{{ content('team_quote','team_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="team_quote_button">{{ content('team_quote','team_quote_button') }}</a>
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