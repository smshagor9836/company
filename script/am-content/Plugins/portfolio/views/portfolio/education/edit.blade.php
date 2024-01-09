@extends('layouts.backend.app')


@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Education') }}</h4>
				<form method="post" action="{{ route('admin.Education.update',$info->id) }}" id="basicform">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						<div class="form-group">
							<label for="title">{{ __('Title') }}<span class="text-danger"><b>*</b></span></label>
							<input type="text" placeholder="Title" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
						</div>
						<div class="form-group">
							<label for="duration">{{ __('duration') }}</label>
							<input type="text" placeholder="duration" class="form-control" name="duration" id="duration" required="" value="{{ $info->slug }}">
						</div>

						<div class="form-group">
							<label for="company">{{ __('Company') }}</label>
							<input type="text" placeholder="company" class="form-control" name="company" id="company" required="" value="{{ $info->tags }}">
						</div>

						<div class="form-group">
							<label for="duration
							excerpt">{{ __('Short description') }}</label>
							<textarea class="form-control" id="excerpt" name="excerpt" maxlength="200">{{ $info->meta->excerpt }}</textarea>
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
			
			

		</div>



		


	</form>
	@include('admin.media.mediamodal')
	@endsection
	@section('script')

	<script src="{{ asset('admin/js/form.js') }}"></script>



	@endsection
{{--<td></td> --}}