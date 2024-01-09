@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="service_breadcrumb">
	<div class="slider-area breadcrumb" id="service_breadcrumb_bg_img" style="background-image: url({{ asset($service->meta->gallery) }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-area text-center">
						<h3 id="service_breadcrumb_title">{{ $service->title }}</h3>
						<div class="breadcrump-title">
							<span id="service_breadcrumb_des">{{ __('Home') }} / {{ $service->title }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- slider area end -->

<!-- service details area start -->
<section>
	<div class="service-details pt-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="service-info">
						<div class="service-title">
							<h2>{{ $service->title }}</h2>
						</div>
						@php 
						$content = json_decode($service->post->content);
						
						@endphp
						<div class="service-des">
							<?php echo $content->content; ?>
							<div class="faq-card pt-50">
								<div class="accordion" id="accordionExample">
									@php
									$i=0;
									@endphp
									@foreach($content->faq as $key=>$row)
									@php
									$i++;
									@endphp
									<div class="card">
										<div class="card-header" id="headingOne">
											<h2 class="mb-0">
												<a type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
													{{ $key }}
												</a>
											</h2>
										</div>

										<div id="collapse{{ $i }}" class="collapse @if($i==1) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body">
												{{ $row }}
											</div>
										</div>
									</div>
									@endforeach

									
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-service" id="sidebar">
						<div class="sidebar-widget mb-50" id="sidebar_bg_img" style="background-image: url({{ asset(content('sidebar','sidebar_bg_img')) }});">
							<div class="single-sidebar-widget">
								<h2 id="sidebar_title">{{ content('sidebar','sidebar_title') }}<span>!</span></h2>
								<div class="contact-number">
									<span>Phone:</span><span><a href="tel:{{ content('sidebar','sidebar_first_phone') }}" id="sidebar_first_phone">{{ content('sidebar','sidebar_first_phone') }}</a></span>
								</div>
								<div class="contact-number">
									<span>Phone2:</span><span><a href="tel:{{ content('sidebar','sidebar_second_phone') }}" id="sidebar_second_phone">{{ content('sidebar','sidebar_second_phone') }}</a></span>
								</div>
								<div class="contact-number">
									<span>Email:</span><span><a href="mailto:{{ content('sidebar','sidebar_email') }}" id="sidebar_email">{{ content('sidebar','sidebar_email') }}</a></span>
								</div>
								<div class="contact-link">
									<a href="{{ url('contact') }}">Contact Us <i class="far fa-arrow-alt-circle-right"></i></a>
								</div>
							</div>
						</div>
						<div class="widget category-list mb-50">
							<h3> {{ __('Categories') }}</h3>
							<div class="category-list-menu">
								<nav>
									<ul class="list-group list-group-flush">
										@foreach(App\Category::where('type',3)->take(8)->get() as $category)
										<li class="list-group-item"><a href="{{ route('service.category',$category->slug) }}">{{ $category->name }}</a></li>
										@endforeach
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- service details area end -->

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
<input type="hidden" id="count_url" value="{{ route('post.view') }}">
<input type="hidden" id="post_id" value="{{ $service->id }}">
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