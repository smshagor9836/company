@extends('layouts.backend.app')
@section('content')
@php

  $info=LpOption('system_basic_info');

@endphp
<div class="row">
  <div class="col-lg-9">      
    <div class="card">
      <div class="card-body">
        <h4>Monkey Theme Option</h4>
        <form method="post" action="{{ route('admin.general.store') }}" id="basicform">
          @csrf
          <div class="custom-form pt-20">
            


            <div class="form-group">
              <label >{{ __('tawk.to Property ID for live chat') }}</label>
              <input type="text" name="propertyid"  class="form-control"  placeholder="Property ID" value="{{ $info->propertyid ?? '' }}" > 
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
       <h5>{{ __('favicon') }}</h5>
       <hr>
       <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('favicon')">
        <img class="img-fluid favicon"  src="{{ asset($info->favicon ?? 'admin/img/img/placeholder.png') }}" alt=""></a>
        <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('favicon')">Select File</a>
      </div>
    </div>
  </div>
  <div class="single-area">
    <div class="card sub">
      <div class="card-body">
        <h5>{{ __('Brands') }}</h5>
        <hr>
        <a href="#" data-toggle="modal" data-target=".media-multiple" class="multi-modal">
          <img class="img-fluid multi-img" id="preview" src="{{ asset($info->gallary_input ?? 'admin/img/img/placeholder.png') }}" alt="">
          <div class="gallary-img">
            @if(!empty($info->gallary_input ?? ''))
             @php
             $gallery=explode(',', $info->gallary_input);
             @endphp 
            @foreach($gallery as $row)
            <img src="{{ asset($row) }}" class="gallary-src">
            @endforeach
            @endif
          </div>
        </a>
      </div>
    </div>
  </div>


</div>

<input type="hidden" class="favicon" name="favicon" value="{{ $info->favicon ?? '' }}">
<input type="hidden" class="gallary_input" name="gallary_input" value="{{ $info->gallary_input ?? '' }}">

</form>
@include('admin.media.mediamodal')
@include('admin.media.multiplemediamodel')
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

    $('.use1').on('click',function(){
      $('.multi-img').hide();
      $('.gallary-src').remove();
      $.each(mycheckboxvalue, function(index, value){
        $(".gallary-img").append('<img class="gallary-src" src="' + value + '" />');
      });

      $('.gallary_input').val(mycheckboxvalue.toString())

    });

  })(jQuery);

//success response will assign here
function success(res){
  location.reload()
} 

function SetId(id){
  getid=id;
}
</script>
@endsection
