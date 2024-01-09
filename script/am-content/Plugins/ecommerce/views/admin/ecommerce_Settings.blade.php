@extends('layouts.backend.app')

@section('content')
<div class="card"  >
	<div class="card-body">
		<h3>Shop Settings</h3>		
		<form id="basicform" method="post" action="{{ route('admin.ecommerce.settings.update') }}">
			@csrf
			<div class="form-group">
				<label>Shipping Charge</label>
				<input type="text" name="shipping" class="form-control" required="" value="{{ $info->shipping }}">
			</div>
			
			<div class="form-group">
				<label>Currency <a href="https://fontawesome.com/" target="_blank">Icon</a> <i class="{{ $info->icon }}"></i></label>
				<input type="text" name="icon" required="" class="form-control" value="{{ $info->icon }}">
			</div>
			<div class="form-group">
				<label>Currency Name</label>
				<input type="text" name="currency" required="" class="form-control" value="{{ $info->currency }}">
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</form>
		
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";	
	//response will assign this function
	function success(res){
		location.reload();
	}
	
</script>
@endsection