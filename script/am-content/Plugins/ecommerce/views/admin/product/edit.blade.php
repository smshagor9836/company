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
    <h4>{{ __('Edit Product') }}</h4>
    <form method="post" id="basicform" action="{{ route('admin.ecommerce.product.update',$info->id) }}">
     @csrf
     @method('PUT')
     <div class="custom-form pt-20">
      <div class="form-group">
       <label for="name">{{ __('Product Title') }}<span class="text-danger"><b>*</b></span></label>
       <input type="text" placeholder="Product Title" name="title" class="form-control" id="name" value="{{ $info->title }}">
     </div>
     <div class="form-group">
       <label >{{ __('Product Slug') }}<span class="text-danger"><b>*</b></span></label>
       <input type="text" placeholder="Product Slug" name="slug" class="form-control"  value="{{ $info->slug }}" required="">
     </div>
     <div class="form-group">
      <label for="name">{{ __('Previous Price') }}</label>
      <input type="number" placeholder="Previous Price" class="form-control" name="p_price" id="p_price" value="{{ $info->productMeta->p_price }}">
    </div>
    <div class="form-group">
      <label >{{ __('Selling Price') }}<span class="text-danger"><b>*</b></span></label>
      <input type="number" placeholder="Selling Price" class="form-control" name="s_price" required="" value="{{ $info->productMeta->s_price }}">
    </div>
    <div class="form-group">
      <label >{{ __('Tax') }}</label>
      <input type="text" placeholder="Enter Tax Without Percent Sign" class="form-control" name="tax" value="{{ $info->productMeta->tax }}">
    </div>
     <div class="form-group">
      <label >{{ __('Quantity') }}</label>
      <input type="number" placeholder="Enter Quantity" class="form-control" name="qty" value="{{ $info->productMeta->qty }}">
    </div>
    <div class="form-group">
      <label >{{ __('SKU') }}</label>
      <input type="text" placeholder="Enter SKU" class="form-control" name="sku" value="{{ $info->productMeta->sku }}">
    </div>
     <div class="form-group">
      <label >Stock Status</label>
      
      <select class="form-control" name="stock_status">
        <option value="In stock" value="{{ $info->productMeta->stock_status == 'In stock' }}">In stock</option>
        <option value="Available on backorder" value="{{ $info->productMeta->stock_status == 'Available on backorder' }}">Available on backorder</option>
        <option value="Out of stock" value="{{ $info->productMeta->stock_status == 'Out of stock' }}">Out of stock</option>
      </select>
    </div>

    <div class="form-group">
     <label for="excerpt">{{ __('Excerpt') }}</label>
     <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt" maxlength="300" >{{ $info->meta->excerpt }}</textarea>
   </div>
   <div class="form-group">
     <label for="content">{{ __('Product Content') }}</label>
     <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content" name="content"><?php echo $json->content; ?></textarea>
   </div>
   <div class="form-group">
     <label for="information">{{ __('Product Information') }}</label>
     <textarea name="information" class="form-control" cols="10" rows="5" placeholder="Enter Information" id="information" >{{ $json->information }}</textarea>
   </div>

 </div>
</div>
</div>
<div class="card">
  <div class="card-body">
   <h4>{{ __('Search Engine Optimization') }}</h4>
   <div class="search-engine">
    <h6 class="pt-15 page-title-seo" id="seotitle">{{ $info->title }}</h6>
    <a href="#" class="text-success" id="seourl">{{ url('/').'/product/'.$info->slug }}</a>
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
    <option value="1" @if($info->status==1) selected="" @endif>{{ __('Published') }}</option>
    <option value="2" @if($info->status==2) selected="" @endif>{{ __('Draft') }}</option>

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
     @php
      $catArr=[];

      foreach ($info->categories as $row) {
        array_push($catArr, $row->id);
      }

      @endphp  

      <?php echo AdminCategoryUpdate(2, $catArr); ?>
       <div class="cover-bar"></div>
     </div>
   </div>
 </div>
</div>
</div>
<div class="single-area">
 <div class="card sub">
  <div class="card-body">
   <h5><a href="#" class="text-dark" data-toggle="modal" data-target=".media-single" class="single-modal">{{ __('Image') }}</a></h5>
   <hr>
   <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
    @php
    if (!empty($info->meta->preview)) {
       $preview= $info->meta->preview;
    }
    else{
      $preview= 'admin/img/img/placeholder.png';
    }
   
    @endphp

    <img class="img-fluid" id="preview" src="{{ asset($preview) }}" alt=""></a>
  </div>
</div>
</div>
<div class="single-area">
  <div class="card sub">
    <div class="card-body">
      <h5><a href="#" class="text-dark" data-toggle="modal" data-target=".media-single" class="single-modal">{{ __('Gallery') }}</a></h5>
      <hr>
      <a href="#" data-toggle="modal" data-target=".media-multiple" class="multi-modal">
        @if(empty($img_array))
        <img class="img-fluid multi-img" id="preview" src="{{ asset('admin/img/img/placeholder.png') }}" alt="">
       
        <div class="gallary-img"></div>
       
          @else
           <div class="gallary-img">
          @foreach($img_array as $row)
             <img class="gallary-src" src="{{ asset($row) }}" height="80" />
          @endforeach
           </div>
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
        <option value="1" @if($info->post->comment_status==1) selected="" @endif >Allowed Comment</option>
        <option value="0" @if($info->post->comment_status==0) selected="" @endif >Comment Not Allow</option>
        <option value="2" @if($info->post->comment_status==2) selected="" @endif >Disqus Comment</option>
        <option value="3" @if($info->post->comment_status==3) selected="" @endif >Facebook Comment</option>
        <option value="4" @if($info->post->comment_status==4) selected="" @endif >Custom Comment</option>
      </select>
    </div>
  </div>
</div>
</div>
</div>
<input type="hidden"  name="type" value="0">
<input type="hidden"  name="post_type" value="ecommerce">
<input type="hidden" id="preview_input" name="preview" value="{{ $info->meta->preview }}">
<input type="hidden" id="gallary_input" name="gallery" value="{{ $info->meta->gallery }}">



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


</script>
@endsection