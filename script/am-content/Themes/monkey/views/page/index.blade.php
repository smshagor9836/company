@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="shop_breadcrumb">
    <div class="slider-area breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3>{{ $info->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->


<div class="pt-100">
    <div class="container">
        <div class="row">
        	<?php echo $info->post->content; ?>
        </div>
    </div>
</div>




@endsection