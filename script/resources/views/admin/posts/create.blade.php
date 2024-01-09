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
     <div class="alert alert-danger none errorarea">
      <ul id="errors">

      </ul>
    </div>
    <h4>{{ __('Add new Post') }}</h4>
    <form method="post" id="basicform" action="{{ route('admin.post.store') }}">
     @csrf
     <div class="custom-form pt-20">
      <div class="form-group">
       <label for="name">{{ __('Post Title') }}</label>
       <input type="text" placeholder="Post Title" name="title" class="form-control" id="name">
     </div>
     <div class="form-group">
       <label for="excerpt">{{ __('Excerpt') }}</label>
       <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt" maxlength="300" ></textarea>
     </div>
     <div class="form-group">
       <label for="content">{{ __('Post Content') }}</label>
       <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content" name="content"></textarea>
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
    <option value="1">{{ __('Published') }}</option>
    <option value="2">{{ __('Draft') }}</option>

  </select>
</div>
</div>
</div>
<?php echo adminLang(); ?>
<div class="single-area">
 <div class="card sub">
  <div class="card-body">
   <h5>{{ __('Categories') }}</h5>
   <hr>
   <div class="scroll-bar-wrap">
     <div class="category-list">
       <?php echo AdminCategory(0) ?>
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
   <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
    <img class="img-fluid" id="preview" src="{{ asset('admin/img/img/placeholder.png') }}" alt=""></a>
  </div>
</div>
</div>


<div class="single-area">
  <div class="card sub">
    <div class="card-body">
      <h5>{{ __('Tags') }}</h5>
      <hr>
      <input type="text" name="tag" id="tags" class="form-control">
    </div>
  </div>
</div>
<div class="single-area">
  <div class="card sub">
    <div class="card-body">
      <h5>{{ __('Comment Status') }}</h5>
      <hr>
      <select class="form-control" name="comment_status">
        <option value="1">{{ __('Allowed Comment') }}</option>
        <option value="0">{{ __('Comment Not Allow') }}</option>
        
      </select>
    </div>
  </div>
</div>
</div>
</div>
<input type="hidden"  name="type" value="0">
<input type="hidden"  name="post_type" value="blog">
<input type="hidden" id="preview_input" name="preview">


</form>
@include('admin.media.mediamodal')

@endsection

@section('script')
<script src="{{ asset('admin/js/summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/custom-summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
<script>
  (function ($) {
    "use strict";

    $('#tags').tagsinput();
    $('.use').on('click',function(){

      $('#preview').attr('src',myradiovalue);
      $('#preview_input').val(myradiovalue);
      
    });


    


     //for multiple
     $('.use1').on('click',function(){
      $('.multi-img').hide();
      $('.gallary-src').remove();
      $.each(mycheckboxvalue, function(index, value){
        $(".gallary-img").append('<img class="gallary-src" src="' + value + '" />');
      });

      $('#gallary_input').val(mycheckboxvalue.toString())

    });



   })(jQuery);
 //response will assign this function
 function success(res){
   location.reload();
 }

</script>
@endsection