@extends('theme::layouts.app')

@section('content')
<!--About Area Start-->
<section class="about pt-100 pb-100" id="portfolio_about">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="about_title">{{ content('portfolio_about','about_title') }}</i> <span id="about_bg_title">{{ content('portfolio_about','about_bg_title') }}</span></h1>
        </div>
        <div class="row">

            <!--About Left Area Start-->
            <div class="col-lg-6">
                <div class="about-left">
                    <img id="about_bg_img" src="{{ content('portfolio_about','about_bg_img') }}" class="img-fluid img-center" alt="">
                </div>
            </div>
            <!--About Left Area End-->

            <!--About Right Area Start-->
            <div class="col-lg-6">
                <div class="about-right">
                    <h3 class="about-right-info-title" id="about_right_title">{{ content('portfolio_about','about_right_title') }}</h3>
                    <p id="about_des">{{ content('portfolio_about','about_des') }}</p>
                    <div class="about-right-info">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong id="your_name">{{ content('portfolio_about','your_name') }}</strong>
                                <br>
                                <strong id="your_email">{{ content('portfolio_about','your_email') }}</strong>
                                <br>
                                <strong id="your_age">{{ content('portfolio_about','your_age') }}</strong>
                            </div>
                            <div class="col-sm-6">

                                <strong id="your_phone">{{ content('portfolio_about','your_phone') }}</strong>
                                <br>
                                <strong id="your_job">{{ content('portfolio_about','your_job') }}</strong>
                                <br>
                                <strong id="your_location">{{ content('portfolio_about','your_location') }}</strong>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--About Right Area End-->
        </div>
    </div>
</section>
<!--About Area End-->
@if(Amcoders\Plugin\Plugin::is_active('services'))
@php 
$services=array( 
    'type'=>4,
    'with'=>'meta',
    'limit'=>6
);
$services=LpPosts($services);
@endphp
@if(count($services) > 0)
<!--Service Area Start-->
<section class="service  pt-100 pb-100" id="portfolio_service">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="service_title">{{ content('portfolio_service','service_title') }}</i> <span id="service_bg_title">{{ content('portfolio_service','service_bg_title') }} </span></h1>
        </div>

        <!--Single Service Area Start-->
        <div class="row">

            @foreach($services as $service)
            <div class="col-lg-4">
                <div class="single-service-item">
                    <img src="{{ asset($service->meta->preview) }}" class="img-fluid" alt="">
                    <h3>{{ $service->title }}</h3>
                    <p>{{ Str::limit($service->meta->excerpt, 200) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!--Single Service Area End-->
    </div>
</section>
<!--Service Area End-->
@endif

@endif
@php 
$educations=array( 
    'type'=>10,
    'with'=>'meta',
   
);
$educations=LpPosts($educations);
$experiences=array( 
    'type'=>9,
    'with'=>'meta',
   
);
$experiences=LpPosts($experiences);
//dd($educations);
@endphp

<!--Resume Area Start-->
<section class="resume pt-100 pb-100" id="resume_id">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="resume_title">{{ content('resume_id','resume_title') }}</i> <span id="resume_background_title">{{ content('resume_id','resume_background_title') }}</span></h1>
        </div>
        <div class="resume-info">
            <div class="row">
                @if(count($educations) > 0)
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-title">
                            <h3 id="education_title">{{ content('resume_id','education_title') }}</h3>
                        </div>

                        <div class="timeline">

                            @foreach($educations as $row)
                            <!-- Education 1 -->
                            <div class="timeline-item">
                                <h4 class="item-title">{{ $row->title }}</h4>
                                <span class="item-period">{{ $row->slug }}</span>
                                <span class="item-small">{{ $row->tags }}</span>
                                <p class="item-description">{{ $row->meta->excerpt }}</p>
                            </div>
                            <!-- / Education 1 -->
                            @endforeach

                        </div>
                    </div>
                </div>
                @endif
                @if(count($experiences) > 0)
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-title">
                            <h3 id="experience_title">{{ content('resume_id','experience_title') }}</h3>
                        </div>

                        <div class="timeline">
                            @foreach($experiences as $row)
                            <!-- Education 1 -->
                            <div class="timeline-item">
                                <h4 class="item-title">{{ $row->title }}</h4>
                                <span class="item-period">{{ $row->slug }}</span>
                                <span class="item-small">{{ $row->tags }}</span>
                                <p class="item-description">{{ $row->meta->excerpt }}</p>
                            </div>
                            <!-- / Education 1 -->
                            @endforeach

                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>
<!--Resume Area End-->


<!--Portfolio Area Start-->
<section class="portfolio  pt-100 pb-100" id="portfolio_section">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="portfolio_title">{{ content('portfolio_section','portfolio_title') }}</i> <span id="portfolio_bg_title">{{ content('portfolio_section','portfolio_bg_title') }}</span></h1>
        </div>

        <!--Portfolio Category Button Area Start-->
        <div class="portfolio-category-button">
            <div class="button-group filter-button-group">
                <button data-filter="*" class="btn-fill">show all</button>
                @foreach($categories as $row)
                <button data-filter=".{{ $row->id }}" class="btn-fill">{{ $row->name }}</button>
                @endforeach
            </div>
        </div>
        <!--Portfolio Category Button Area End-->

        <!--Single Portfolio Item Area Start-->
        <div class="row grid">
           @foreach($portfolios as $row)
           <div class="col-lg-4 element-item  @foreach($row->portfolioCategory as $cat) {{ $cat->category_id }} @endforeach">
            <div class="portfolio-item">
                <div class="item-image">
                    <img src="{{ asset($row->meta->preview) }}" alt="">
                </div>
                <div class="item-content">
                    @foreach($row->portfolioCategory as $cat)
                    <div class="item-category"><span>{{ $cat->category->name  }}</span></div>
                    @endforeach
                    <div class="item-title">
                        <a href="{{ url($row->slug) }}"><span>{{ $row->title }} <i class="fas fa-long-arrow-alt-right"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!--Single Portfolio Item Area End-->
</div>
</section>
<!--Portfolio Area End-->


@php
$testimonials=array(
    'type'=>5,
    'with'=>'meta',
    'translate'=>false
);
$testimonials=LpPosts($testimonials);
@endphp

@if(count($testimonials) > 0)
<!--Client Area Start-->
<section class="client  pt-100 pb-100" id="review_section">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="review_title">{{ content('review_section','review_title') }}</i> <span id="review_bg_title">{{ content('review_section','review_bg_title') }}</span></h1>
        </div>
        <div class="row">
            <div class="client-review owl-carousel">
                @foreach($testimonials as $row)
                @php 
                $meta=json_decode($row->meta->excerpt);
                @endphp
                <div class="item">
                    <div class="client-message">
                        <p>{{ $meta->excerpt }}</p>
                    </div>
                    <div class="client-img">
                        <img src="{{ asset($row->meta->preview) }}" alt="" class="img-fluid round">
                    </div>
                    <div class="client-info">
                        <h5>{{ $row->title }}</h5>
                        <small>{{ $meta->company_name }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Client Area End-->

@endif

<!--Contact Area Start-->
<section class="contact  pt-100 pb-100" id="portfolio_contact">
    <div class="container">
        <div class="section-title text-sm-center">
            <h1><i id="contact_title">{{ content('portfolio_contact','contact_title') }}</i> <span id="contact_bg_title">{{ content('portfolio_contact','contact_bg_title') }}</span></h1>
        </div>

        <!--Contact Me Info Area Start-->
        <div class="row">
            <div class="col-lg-4 text-sm-center">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4 id="contact_first_section_title">{{ content('portfolio_contact','contact_first_section_title','contact_first_section') }}</h4>
                    <p id="contact_first_section_phone">{{ content('portfolio_contact','contact_first_section_phone','contact_first_section') }}</p>
                </div>
            </div>
            <div class="col-lg-4 text-sm-center">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <h4 id="contact_secound_section_title">{{ content('portfolio_contact','contact_secound_section_title','contact_secound_section') }}</h4>
                    <p id="contact_secound_section_email">{{ content('portfolio_contact','contact_secound_section_email','contact_secound_section') }}</p>
                </div>
            </div>
            <div class="col-lg-4 text-sm-center">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4 id="contact_third_section_title">{{ content('portfolio_contact','contact_third_section_title','contact_third_section') }}</h4>
                    <p id="contact_third_section_location">{{ content('portfolio_contact','contact_third_section_location','contact_third_section') }}</p>
                </div>
            </div>
        </div>
        <!--Contact Me Info Area end-->

        <!--Contact Me Form Area Start-->
        <form class="form" method="post" action="{{ route('contact') }}"  id="contact_form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-lg-6">
                    <input type="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="col-lg-12">
                    <input type="text" id="subject" placeholder="Your Subject" required>
                </div>
                <div class="col-lg-12">
                    <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn-fill" id="contact_btn">{{ content('portfolio_contact','contact_btn') }}</button>
                </div>
                <div class="col-lg-12 text-center">
                    <h5 class="text-success pt-15" id="success"></h5>
                    <h5 class="text-danger" id="error"></h5>
                </div>
            </div>

        </form>
        <!--Contact Me Form Area end-->
    </div>
</section>
<!--Contactn Area End-->
@endsection