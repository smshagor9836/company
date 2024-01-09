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
        <h4>{{ __('Add New Testimonial') }}</h4>
        <form method="post" action="{{ route('admin.testimonial.store') }}" id="basicform">
          @csrf
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Client Name') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Service Title" class="form-control" name="title" id="title" required="">
            </div>
            <div class="form-group">
              <label>{{ __('Company Name') }}</label>
              <input type="text" placeholder="Company Name" class="form-control" name="company_name">
            </div>
           

            <div class="form-group">
             <label for="excerpt">{{ __('Testimonial') }}</label>
             <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="Testimonial" id="excerpt"  ></textarea>
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
     <h5>{{ __('Client Profile') }}</h5>
     <hr>
     <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
      <img class="img-fluid" id="preview" src="{{ asset('admin/img/img/placeholder.png') }}" alt=""></a>
    </div>
  </div>
</div>



</div>

<input type="hidden" name="type" value="5">
<input type="hidden" id="preview_input" name="preview">

</form>
@include('admin.media.mediamodal')
@endsection
@section('script')

<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>

<script>
  (function ($) {
    "use strict";
   


    $('.use').on('click',function(){

      $('#preview').attr('src',myradiovalue);
      $('#preview_input').val(myradiovalue);
      
    });


  })(jQuery);

//success response will assign here
function success(res){
  location.reload()
} 
</script>
@endsection
{{--<td></td> --}}