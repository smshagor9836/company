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
    <form method="post" id="basicform" action="{{ route('admin.post.update',$info->id) }}">
     @csrf
     @method('PUT')
     <div class="custom-form pt-20">
      <div class="form-group">
       <label for="name">{{ __('Post Title') }}</label>
       <input type="text" placeholder="Post Title" name="title" class="form-control" id="name" value="{{ $info->title }}">
     </div>
     <div class="custom-form pt-20">
      <div class="form-group">
       <label for="slug">{{ __('Post Slug') }}</label>
       <input type="text" placeholder="Post Title" name="slug" class="form-control" id="slug" value="{{ $info->slug }}">
     </div>
   </div>
   <div class="form-group">
     <label for="excerpt">{{ __('Excerpt') }}</label>
     <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt" maxlength="300">{{ $info->meta->excerpt }}</textarea>
   </div>
   <div class="form-group">
     <label for="content">{{ __('Post Content') }}</label>
     <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content" name="content"><?php echo $info->post->content; ?></textarea>
   </div>
 </div>
</div>
</div>
<div class="card">
  <div class="card-body">
   <h4>{{ __('Search Engine Optimization') }}</h4>
   <div class="search-engine">
    <h6 class="pt-15 page-title-seo" id="seotitle">{{ $info->title }}</h6>
    <a href="#" class="text-success" id="seourl">'{{ url('/').'/post/'.$info->slug }}</a>
    <p id="seodescription">{{ $info->meta->excerpt }}</p>
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
    <option value="1" @if($info->status == 1) selected="" @endif>{{ __('Published') }}</option>
    <option value="2" @if($info->status == 2) selected="" @endif>{{ __('Draft') }}</option>

  </select>
</div>
</div>
</div>
<?php echo adminLang($info->lang); ?>
<div class="single-area">
 <div class="card sub">
  <div class="card-body">
   <h5>{{ __('Categories') }}</h5>
   <hr>
   <div class="scroll-bar-wrap">
     <div class="category-list">

      @php
      $catArr=[];

      foreach ($info->categories as $row) {
        array_push($catArr, $row->id);
      }

      @endphp  

      <?php echo AdminCategoryUpdate(0, $catArr); ?>

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
    @if(empty($info->meta->preview))
    <img class="img-fluid" id="preview" src="{{ asset('admin/img/img/placeholder.png') }}" alt="">
    @else
    <img class="img-fluid" id="preview" src="{{ asset($info->meta->preview) }}" alt="">
    @endif
  </a>
</div>
</div>
</div>



<div class="single-area">
  <div class="card sub">
    <div class="card-body">
      <h5>{{ __('Tags') }}</h5>
      <hr>
      <input type="text" name="tag" id="tags" class="form-control" value="{{ $info->tags }}">
    </div>
  </div>
</div>
<div class="single-area">
  <div class="card sub">
    <div class="card-body">
      <h5>{{ __('Comment Status') }}</h5>
      <hr>
      <select class="form-control" name="comment_status">
        <option value="1" @if($info->post->comment_status == 1) selected="" @endif>Allowed Comment</option>
        <option value="0" @if($info->post->comment_status == 0) selected="" @endif>Comment Not Allow</option>
        <option value="2" @if($info->post->comment_status == 2) selected="" @endif>Disqus Comment</option>
        <option value="3" @if($info->post->comment_status == 3) selected="" @endif>Facebook Comment</option>
        <option value="4" @if($info->post->comment_status == 4) selected="" @endif>Custom Comment</option>
      </select>
    </div>
  </div>
</div>
</div>
</div>
<input type="hidden"  name="type" value="0">
<input type="hidden"  name="post_type" value="blog">
<input type="hidden" id="preview_input" name="preview" value="{{ $info->meta->preview }}">


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

    $('.use1').on('click',function(){
      $('.multi-img').remove();

      $('.gallary-src').remove();

      $.each(mycheckboxvalue, function(index, value){
        $(".gallary-img").append('<img class="gallary-src" src="' + value + '" />');
      });

      $('#gallary_input').val(mycheckboxvalue.toString())

    });


    $('#slug').on('input',function(){

      $('#seotitle').html($('#slug').val());
      let slug = $('#slug').val().replace(" ", "-");
      $('#seourl').html('{{ url('/').'/post/' }}'+slug)
    })
    $('#description').on('input',function(){
      $('#seodescription').html($('#description').val());
    })

  })(jQuery); 


  //response will assign this function
  function success(res){
   Sweet('success','Post Updated')
 }
 function errosresponse(xhr){

  $("#errors").html("<li class='text-danger'>"+xhr.responseJSON[0]+"</li>")
}


</script>
@endsection