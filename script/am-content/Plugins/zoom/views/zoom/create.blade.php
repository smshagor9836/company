@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" href="{{ theme_asset('monkey/public/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection
@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new Metting') }}</h4>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="post" action="{{ route('zoom.create_metting') }}" id="basicform">
					@csrf
				<div class="custom-form pt-20">
					<div class="form-group">
						<label for="topic">{{ __('Metting Topic') }}</label>
						<input type="text" placeholder="Metting Topic" class="form-control" name="topic" id="topic">
					</div>
					<div class="form-group">
						<label for="type">{{ __('Metting Type') }}</label>
						<select class="custom-select mr-sm-2" id="type" name="type">
							<option value="1">Instant Metting</option>
							<option selected value="2">Scheduled Metting</option>
							<option value="3">Recurring metting with no fixed time</option>
						</select>
					</div>
					<div class="form-group">
						<label for="time">{{ __('Start Time') }}</label>
						<input type="text" placeholder="Start Time" class="form_datetime form-control" name="start_time" id="time" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="duration">{{ __('Metting Duration(minutes)') }}</label>
						<input type="number" placeholder="Metting Duration" class="form-control" name="duration" id="duration">
					</div>
					@php 
					$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
					@endphp
					<div class="form-group">
						<label for="timezone">{{ __('Metting TimeZone') }}</label>
						<select class="custom-select mr-sm-2" id="timezone" name="timezone">
							@foreach($tzlist as $value)
							<option {{ $value == date_default_timezone_get() ? 'selected' : ''  }} value="{{ $value }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="user">{{ __('Select User') }}</label>
						<select class="all-user custom-select mr-sm-2" id="user" name="user[]" multiple>
							@foreach(App\User::where('role_id',2)->get() as $value)
							<option  value="{{ $value->id }}">{{ $value->email }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="password">{{ __('Metting Password') }}</label>
						<input type="password" placeholder="Metting Password" class="form-control" name="password" id="password">
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
		   			<h5>{{ __('Settings') }}</h5>
		   			<hr>
		   			<div class="scroll-bar-wrap">
		     			<div class="category-list">
		       				<div class="custom-control custom-checkbox"><input type="checkbox" name="host_video" checked class="custom-control-input" value="1" id="host_video">
								<label class="custom-control-label" for="host_video">Host Video
								</label>
							</div>
							<div class="custom-control custom-checkbox"><input type="checkbox" name="participant_video" class="custom-control-input" value="1" id="participant_video">
								<label class="custom-control-label" for="participant_video">Participant Video
								</label>
							</div>
							<div class="custom-control custom-checkbox"><input type="checkbox" name="join_before_host" checked class="custom-control-input" value="1" id="join_before_host">
								<label class="custom-control-label" for="join_before_host">Join Before Host
								</label>
							</div>
		       				<div class="cover-bar"></div>
		     			</div>
		   			</div>
		 		</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script src="{{ theme_asset('monkey/public/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script>
	$(".form_datetime").datetimepicker({
		format: 'yyyy-mm-ddThh:mm:ss',
		autoclose: true,
		todayBtn: true
	});
	$('.all-user').select2();
</script>
@endsection