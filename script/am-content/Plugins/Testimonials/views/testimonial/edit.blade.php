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
        <h4>{{ __('EditTestimonial') }}</h4>
        <form method="post" action="{{ route('admin.testimonial.update',$info->id) }}" id="basicform">
          @csrf
          @method('PUT')
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Client Name') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Service Title" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
            </div>
           
            <div class="form-group">
              <label>Company Name</label>
              <input type="text" placeholder="Company Name" class="form-control" name="company_name" value="{{ $json->company_name }}">
            </div>
            

            <div class="form-group">
             <label for="excerpt">Testimonial</label>
             <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="Testimonial" id="excerpt" >{{ $json->excerpt }}</textarea>
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
     <h5  data-toggle="modal" data-target=".media-single" >{{ __('Client Profile') }}</h5>
     <hr>
     <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
      <img class="img-fluid" id="preview" src="{{ asset($info->meta->preview ?? 'admin/img/img/placeholder.png') }}" alt=""></a>
    </div>
  </div>
</div>



</div>

<input type="hidden" name="type" value="5">
<input type="hidden" id="preview_input" name="preview" value="{{ $info->meta->preview }}">

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


</script>
@endsection
{{--<td></td> --}}