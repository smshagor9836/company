@extends('layouts.backend.app')
@section('content')
<div class="row">
  <div class="col-lg-9">      
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new portfolio') }}</h4>
        <form method="post" action="{{ route('admin.portfolio.store') }}" id="basicform">
          @csrf
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Title') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Title" class="form-control" name="title" id="title" required="">
            </div>
            <div class="form-group">
              <label for="url">{{ __('Url') }}</label>
              <input type="text" placeholder="link" class="form-control" name="url" id="url">
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
         <h5>{{ __('Categories') }}</h5>
         <hr>
         <div class="scroll-bar-wrap">
           <div class="category-list">
            <?php echo AdminCategory(8) ?>
            <div class="cover-bar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="single-area">
   <div class="card sub">
    <div class="card-body">
     <h5>{{ __('Image') }}</h5>
     <hr>
     <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('preview')">
      <img class="img-fluid preview"  src="{{ asset('admin/img/img/placeholder.png') }}" alt=""></a>
    </div>
  </div>
</div>
</div>

<input type="hidden" name="type" value="8">
<input type="hidden" class="preview" name="preview">

</form>
@include('admin.media.mediamodal')
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
