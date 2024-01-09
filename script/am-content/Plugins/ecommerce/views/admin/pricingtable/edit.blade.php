@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Service') }}</h4>
				<form method="post" action="{{ route('admin.ecommerce.pricing.update',$info->id) }}" id="basicform">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						<div class="form-group">
							<label for="title">{{ __('Pricing Title') }}<span class="text-danger"><b>*</b></span></label>
							<input type="text" placeholder="Pricing Title" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
						</div>
						<div class="form-group">
							<label for="name">{{ __('Previous Price') }}</label>
							<input type="number" placeholder="Previous Price" class="form-control" name="p_price" id="name" value="{{ $info->productMeta->p_price }}">
						</div>
						<div class="form-group">
							<label >{{ __('Selling Price') }}<span class="text-danger"><b>*</b></span></label>
							<input type="number" placeholder="Selling Price" class="form-control" name="s_price" required="" value="{{ $info->productMeta->s_price }}">
						</div>
						<div class="form-group">
							<label for="duration">{{ __('Duration') }}</label>
							<input type="text" placeholder="Per Month" class="form-control" name="duration" id="duration" value="{{ $json->duration }}">
						</div>
						<div class="form-group">
							<label >{{ __('Order Url') }}</label>
							<input type="text" placeholder="Order Link" class="form-control" name="link" value="{{ $json->link }}">
						</div>
						<div class="form-group">
							<label >{{ __('Tax') }}</label>
							<input type="text" placeholder="Enter Tax Without Percent Sign" class="form-control" name="tax" value="{{ $info->productMeta->tax }}">
						</div>

						

						<div class="form-group">
							<label >{{ __('Service') }}</label>
							<table class="table table-bordered" id="dynamic_field">  
								  

								@foreach($json->service as $key => $row)
								<tr id="row{{ $key }}">
									<td>
										<input type="text" name="service[]" placeholder="Enter Service Name" class="form-control name_list" value="{{ $row }}">
									</td>
									<td>
										<button type="button" name="remove" id="{{ $key }}" class="btn btn_remove col-12">Remove</button>
									</td>
								</tr>
								@endforeach

							</table> 
							<button type="button" name="add" id="add" class="btn btn-success col-12">Add More</button> 
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
							<option selected value="1" @if($info->status==1) selected @endif>{{ __('Published') }}</option>
							<option value="2" @if($info->status==2) selected @endif>{{ __('Draft') }}</option>

						</select>
					</div>
				</div>
			</div>
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5>{{ __('Is Selected ?') }}</h5>
						<hr>
						
						<select class="form-control"  class="custom-select mr-sm-2" name="active">
							<option value="disable" @if($json->active=="disable") selected @endif>No</option>
							<option value="active" @if($json->active=="active") selected @endif>Yes</option>
						</select>
					</div>
				</div>
			</div>


		</div>

		<input type="hidden" name="type" value="2">
		<input type="hidden"  name="post_type" value="pricing_table">
	</form>
	@include('admin.media.mediamodal')
	@endsection
	@section('script')
	<script src="{{ asset('admin/js/summernote.min.js') }}"></script>
	<script src="{{ asset('admin/js/custom-summernote.min.js') }}"></script>
	<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('admin/js/form.js') }}"></script>

	<script>
		(function ($) {
			"use strict";
			var i=1;  
			$('#add').click(function(){  
				i++;  
				$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="service[]" placeholder="Enter Service Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn_remove col-12">Remove</button></td></tr>');  
			});  
			$(document).on('click', '.btn_remove', function(){  
				var button_id = $(this).attr("id");   
				$('#row'+button_id+'').remove();  
			});  

		})(jQuery);
</script>
@endsection