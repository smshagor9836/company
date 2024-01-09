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
				<h4>{{ __('Add new Service') }}</h4>
				<form method="post" action="{{ route('admin.ecommerce.pricing.store') }}" id="basicform">
					@csrf
					<div class="custom-form pt-20">
						<div class="form-group">
							<label for="title">{{ __('Pricing Title') }}<span class="text-danger"><b>*</b></span></label>
							<input type="text" placeholder="Pricing Title" class="form-control" name="title" id="title" required="">
						</div>
						<div class="form-group">
							<label for="name">{{ __('Previous Price') }}</label>
							<input type="number" placeholder="Previous Price" class="form-control" name="p_price" id="name" >
						</div>
						<div class="form-group">
							<label >{{ __('Selling Price') }}<span class="text-danger"><b>*</b></span></label>
							<input type="number" placeholder="Selling Price" class="form-control" name="s_price" required="">
						</div>
						<div class="form-group">
							<label for="duration">{{ __('Duration') }}</label>
							<input type="text" placeholder="Per Month" class="form-control" name="duration" id="duration" >
						</div>
						<div class="form-group">
							<label >{{ __('Order Url') }}</label>
							<input type="text" placeholder="Order Link" class="form-control" name="link" >
						</div>
						<div class="form-group">
							<label >{{ __('Tax') }}</label>
							<input type="text" placeholder="Enter Tax Without Percent Sign" class="form-control" name="tax" >
						</div>

						

						<div class="form-group">
							<label >{{ __('Service') }}</label>
							<table class="table table-bordered" id="dynamic_field">  
								<tr>  
									<td><input type="text" name="service[]" placeholder="Enter Service Name" class="form-control name_list" /></td>  
									<td><button type="button" name="add" id="add" class="btn btn-success col-12">Add More</button></td>  
								</tr>  
							</table>  
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
							<option selected value="1">{{ __('Published') }}</option>
							<option value="2">{{ __('Draft') }}</option>

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
								<option value="disable">No</option>
								<option value="active">Yes</option>
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

//success response will assign here
function success(res){
	location.reload()
}	
</script>
@endsection