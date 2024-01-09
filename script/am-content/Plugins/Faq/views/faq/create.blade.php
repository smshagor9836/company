@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/summernote.min.css') }}">

@endsection

@section('content')
<div class="row">
  <div class="col-lg-9">      
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new faq') }}</h4>
        <form method="post" action="{{ route('admin.faq.store') }}" id="basicform">
          @csrf
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Page Title') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Page Title" class="form-control" name="title" id="title" required="">
            </div>
            <div class="form-group">
             <label for="excerpt">{{ __('Excerpt') }}</label>
             <textarea name="excerpt" class="form-control" cols="30" rows="3" placeholder="short description" id="excerpt"></textarea>
           </div>
          
           

           <div class="form-group">
            <label >FAQ's</label>
            <table class="table table-bordered" id="dynamic_field">  
              <tr>  
                <td><input type="text" name="question[]" placeholder="Enter Question Name" class="form-control name_list"  /></td>  
                
              </tr>
              <tr>
                <td><textarea class="form-control"  placeholder="Enter Answer" name="answer[]"></textarea></td>
              </tr> 


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
    
    <?php echo adminLang(); ?>
    
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
 <div class="single-area">
   <div class="card sub">
    <div class="card-body">
     <h5>{{ __('Banner') }}</h5>
     <hr>
     <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal" onclick="SetId('banner')">
      <img class="img-fluid banner" src="{{ asset('admin/img/img/placeholder.png') }}" alt=""></a>
    </div>
  </div>
</div>


</div>

<input type="hidden" name="type" value="2">
<input type="hidden"  name="post_type" value="service">
<input type="hidden" class="preview" name="image">
<input type="hidden" class="banner" name="banner">

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
