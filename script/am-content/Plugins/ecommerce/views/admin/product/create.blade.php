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
    <h4>{{ __('Add New Product') }}</h4>
    <form method="post" id="basicform" action="{{ route('admin.ecommerce.product.store') }}">
     @csrf
     <div class="custom-form pt-20">
      <div class="form-group">
       <label for="name">{{ __('Product Title') }}<span class="text-danger"><b>*</b></span></label>
       <input type="text" placeholder="Product Title" name="title" class="form-control" id="name">
     </div>
     <div class="form-group">
      <label for="name">{{ __('Previous Price') }}</label>
      <input type="number" placeholder="Previous Price" class="form-control" name="p_price" id="p_price" >
    </div>
    <div class="form-group">
      <label >{{ __('Selling Price') }}<span class="text-danger"><b>*</b></span></label>
      <input type="number" placeholder="Selling Price" class="form-control" name="s_price" required="">
    </div>
    <div class="form-group">
      <label >{{ __('Tax') }}</label>
      <input type="text" placeholder="Enter Tax Without Percent Sign" class="form-control" name="tax" >
    </div>
     <div class="form-group">
      <label >{{ __('Quantity') }}</label>
      <input type="number" placeholder="Enter Quantity" class="form-control" name="qty" >
    </div>
    <div class="form-group">
      <label >{{ __('SKU') }}</label>
      <input type="text" placeholder="Enter SKU" class="form-control" name="sku" >
    </div>
     <div class="form-group">
      <label >Stock Status</label>
      
      <select class="form-control" name="stock_status">
        <option value="In stock">In stock</option>
        <option value="Available on backorder">Available on backorder</option>
        <option value="Out of stock">Out of stock</option>
      </select>
    </div>

    <div class="form-group">
     <label for="excerpt">{{ __('Excerpt') }}</label>
     <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt" maxlength="300" ></textarea>
   </div>
   <div class="form-group">
     <label for="content">{{ __('Product Content') }}</label>
     <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content" name="content"></textarea>
   </div>
   <div class="form-group">
     <label for="information">{{ __('Product Information') }}</label>
     <textarea name="information" class="form-control" cols="10" rows="5" placeholder="Enter Information" id="information" ></textarea>
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

<div class="single-area">
 <div class="card sub">
  <div class="card-body">
   <h5>{{ __('Categories') }}</h5>
   <hr>
   <div class="scroll-bar-wrap">
     <div class="category-list">
       <?php echo AdminCategory(2) ?>
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
      <h5>{{ __('Gallery') }}</h5>
      <hr>
      <a href="#" data-toggle="modal" data-target=".media-multiple" class="multi-modal">
        <img class="img-fluid multi-img" id="preview" src="{{ asset('admin/img/img/placeholder.png') }}" alt="">
        <div class="gallary-img">


        </div>
      </a>
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
        <option value="1">Allowed Comment</option>
        <option value="0">Comment Not Allow</option>
        <option value="2">Disqus Comment</option>
        <option value="3">Facebook Comment</option>
        <option value="4">Custom Comment</option>
      </select>
    </div>
  </div>
</div>
</div>
</div>
<input type="hidden"  name="type" value="0">
<input type="hidden"  name="post_type" value="ecommerce">
<input type="hidden" id="preview_input" name="preview">
<input type="hidden" id="gallary_input" name="gallery">



</form>
@include('admin.media.mediamodal')
@include('admin.media.multiplemediamodel')
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