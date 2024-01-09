@extends('layouts.backend.app')


@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Portfolio') }}</h4>
				<form method="post" action="{{ route('admin.portfolio.update',$info->id) }}" id="basicform">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						<div class="form-group">
							<label for="title">{{ __('Portfolio Title') }}<span class="text-danger"><b>*</b></span></label>
							<input type="text" placeholder="Portfolio Title" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
						</div>
						<div class="form-group">
							<label for="slug">{{ __('Portfolio url') }}</label>
							<input type="text" placeholder="Slug" class="form-control" name="slug" id="slug" required="" value="{{ $info->slug }}">
						</div>
						


					

					</div>

				</div>
			</div>

		</div>
		<div class="col-lg-3">
			<div class="single-area">
				<div class="card">
					<div class="card-body">
						<h5>{{ __('Publish') }}</h5>
						<hr>
						<div class="btn-publish">
							<button type="submit" class="btn btn-save"><i class="fa fa-save"></i> {{ __('Save') }}</button>
						</div>
					</div>
				</div>
			</div>
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5>{{ __('Status') }}</h5>
						<hr>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
							<option value="1" @if($info->status==1) selected="" @endif>{{ __('Published') }}</option>
							<option value="2" @if($info->status==2) selected="" @endif>{{ __('Draft') }}</option>

						</select>
					</div>
				</div>
			</div>
			
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5>{{ __('Categories') }}</h5>
						<hr>
						<div class="scroll-bar-wrap">
							<div class="category-list">
								@php
								$catArr=[];

								foreach ($info->categories as $row) {
									array_push($catArr, $row->id);
								}

								@endphp 
								<?php echo AdminCategoryUpdate(8, $catArr); ?>

								<div class="cover-bar"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('preview')">
							<h5>{{ __('Image') }}</h5>
							<hr>

							@php
							if (!empty($info->meta->preview)) {
								$preview= $info->meta->preview;
							}
							else{
								$preview= 'admin/img/img/placeholder.png';
							}

							@endphp

							<img class="img-fluid preview"  src="{{ asset($preview) }}" alt=""></a>
						</div>
					</div>
				</div>
			</div>

			<input type="hidden" name="type" value="4">
			<input type="hidden"  name="post_type" value="service">

			<input type="hidden" class="preview" name="preview" value="{{ $info->meta->preview }}">


		</form>
		@include('admin.media.mediamodal')
		@endsection
		@section('script')
		
		<script src="{{ asset('admin/js/form.js') }}"></script>
		<script src="{{ asset('admin/js/media.js') }}"></script>

		<script>
			var getid='';
			(function ($) {
				"use strict";


				$('.use').on('click',function(){

					$('.'+getid).attr('src',myradiovalue);
					$('.'+getid).val(myradiovalue);

				});


			})(jQuery);


			function SetId(id){
				getid=id;
			}
		</script>
		@endsection
{{--<td></td> --}}