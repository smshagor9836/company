@extends('layouts.backend.app')
@section('content')
<div class="row">
  <div class="col-lg-9">      
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new education') }}</h4>
        <form method="post" action="{{ route('admin.Education.store') }}" id="basicform">
          @csrf
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Title') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Title" class="form-control" name="title" id="title" required="">
            </div>
            <div class="form-group">
              <label for="duration">{{ __('duration') }}</label>
              <input type="text" placeholder="duration" class="form-control" name="duration" id="duration" required="">
            </div>

            <div class="form-group">
              <label for="company">{{ __('Institute') }}</label>
              <input type="text" placeholder="Institute" class="form-control" name="Institute" id="company" required="">
            </div>

            <div class="form-group">
              <label for="duration
              excerpt">{{ __('Short description') }}</label>
             <textarea class="form-control" id="excerpt" name="excerpt" maxlength="200"></textarea>
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


</div>

<input type="hidden" name="type" value="10">


</form>
@include('admin.media.mediamodal')
@endsection
@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>


<script>


//success response will assign here
function success(res){
  location.reload()
} 


</script>
@endsection
