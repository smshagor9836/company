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
				<h4>{{ __('Add new Page') }}</h4>
				<form method="post" action="{{ route('admin.page.store') }}" id="basicform">
				@csrf
				<div class="custom-form pt-20">
						<div class="form-group">
							<label for="name">{{ __('Page Title') }}</label>
							<input type="text" placeholder="Page Title" class="form-control" name="title" id="name">
						</div>
						<div class="form-group">
							<label for="content">{{ __('Meta Description') }}</label>
							<textarea name="excerpt" class="form-control"  cols="30" rows="5" placeholder="Short description" id="description"></textarea>
						</div>
						<div class="form-group">
							<label for="content">{{ __('Page Content') }}</label>
							<textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content"></textarea>
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
		<?php echo adminLang(); ?>
		
		<div class="single-area">
			<div class="card sub">
				<div class="card-body">
					<h5>{{ __('Meta Tags') }}</h5>
					<hr>
					<input type="text" name="tag" id="tags" placeholder="Enter tags">
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="type" value="1">
	<input type="hidden"  name="post_type" value="page">
</form>
@include('admin.media.mediamodal')
@endsection
@section('script')
<script src="{{ asset('admin/js/summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/custom-summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>

<script>	
 $('#tags').tagsinput();
//success response will assign here
 function success(res){
    location.reload()
}	
</script>
@endsection