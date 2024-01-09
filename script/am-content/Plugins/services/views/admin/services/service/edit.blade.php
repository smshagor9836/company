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
        <h4>{{ __('Edit Service') }}</h4>
        <form method="post" action="{{ route('admin.service.service.update',$info->id) }}" id="basicform">
          @csrf
          @method('PUT')
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Service Title') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Service Title" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
            </div>
            <div class="form-group">
              <label for="slug">{{ __('Service Slug') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Slug" class="form-control" name="slug" id="slug" required="" value="{{ $info->slug }}">
            </div>
            <div class="form-group">
             <label for="excerpt">{{ __('Excerpt') }}</label>
             <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt" maxlength="300" >{{ $info->meta->excerpt }}</textarea>
           </div>
           <div class="form-group">
             <label for="content">{{ __('Service Page Content') }}</label>
             <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content" name="content"><?php echo $json->content; ?></textarea>
           </div>
           

           <div class="form-group">
            <label >FAQ's</label>
            <table class="table table-bordered" id="dynamic_field">  
              @php
              $i=20;
              @endphp
             @foreach($json->faq as $key=> $row)
             @php
             $i++;
             @endphp
              <tr class="row{{ $i }}">  
                <td><input type="text" name="question[]" placeholder="Enter Question Name" class="form-control name_list" value="{{ $key }}" /></td>  
                
              </tr>
              <tr class="row{{ $i }}">
                <td><textarea class="form-control"  placeholder="Enter Answer" name="answer[]">{{ $row }}</textarea></td>
              </tr> 
              <tr class="row{{ $i }}">
                <td> <button type="button" name="remove" id="{{ $i }}" class="btn btn_remove col-12">Remove</button> </td>
              </tr><br>
              @endforeach

            </table>  
            <button type="button" name="add" id="add" class="btn btn-success col-12">Add More FAQ</button>
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
          <?php echo AdminCategoryUpdate(3, $catArr); ?>
         
           <div class="cover-bar"></div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="single-area">
   <div class="card sub">
    <div class="card-body">
       <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('preview')">
     <h5>{{ __('Image') }}</h5>
     <hr>
    
       @php
    if (!empty($info->meta->preview)) {
       $preview= $info->meta->preview;
    }
    else{
      $preview= 'admin/img/img/placeholder.png';
    }
   
    @endphp

    <img class="img-fluid preview"  src="{{ asset($preview) }}" alt=""></a>
    </div>
  </div>
</div>
<div class="single-area">
   <div class="card sub">
    <div class="card-body">
       <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('gallery')">
     <h5>{{ __('Banner') }}</h5>
     <hr>
    
       @php
    if (!empty($info->meta->gallery)) {
       $gallery= $info->meta->gallery;
    }
    else{
      $gallery= 'admin/img/img/placeholder.png';
    }
   
    @endphp

    <img class="img-fluid gallery"  src="{{ asset($gallery) }}" alt=""></a>
    </div>
  </div>
</div>



</div>

<input type="hidden" name="type" value="4">
<input type="hidden"  name="post_type" value="service">

<input type="hidden" class="preview" name="preview" value="{{ $info->meta->preview }}">
<input type="hidden" class="gallery" name="gallery" value="{{ $info->meta->gallery }}">

</form>
@include('admin.media.mediamodal')
@endsection
@section('script')
<script src="{{ asset('admin/js/summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/custom-summernote.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>

<script>
   var getid='';
  (function ($) {
    "use strict";
    var i=1;  
    $('#add').click(function(){  
      i++;  
      $('#dynamic_field').append('<tr class="row'+i+'"><td>Question No '+ i +'</td></tr><tr class="row'+i+'"><td><input type="text" name="question[]" placeholder="Enter Question" class="form-control name_list" /></td></tr><tr class="row'+i+'"><td> <textarea class="form-control"  placeholder="Enter Answer" name="answer[]"></textarea> </td></tr><tr class="row'+i+'"><td> <button type="button" name="remove" id="'+i+'" class="btn btn_remove col-12">Remove</button> </td></tr>');  
    });  
    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('.row'+button_id+'').remove();  
    });  



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
{{--<td></td> --}}