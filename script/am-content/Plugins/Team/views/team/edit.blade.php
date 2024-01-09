@extends('layouts.backend.app')



@section('content')
<div class="row">
  <div class="col-lg-9">      
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Edit Team Member') }}</h4>
        <form method="post" action="{{ route('admin.team.update',$info->id) }}" id="basicform">
          @csrf
          @method('PUT')
          <div class="custom-form pt-20">
            <div class="form-group">
              <label for="title">{{ __('Name') }}<span class="text-danger"><b>*</b></span></label>
              <input type="text" placeholder="Name" class="form-control" name="title" id="title" required="" value="{{ $info->title }}">
            </div>
             <div class="form-group">
              <label for="position">{{ __('Position') }}</label>
              <input type="text" placeholder="Position" class="form-control" name="position" id="position" value="{{ $info->slug }}">
            </div>
        

           <div class="form-group">
            <label >Social Profile</label>
            <table class="table table-bordered" id="dynamic_field">  
              @foreach($json as $key=>$row)
              <tr>  
                <td><input type="text" name="icon[]" placeholder="fa fa-facebook" class="form-control name_list" value="{{ $key }}" /></td>  
                
              </tr>
              <tr>
                <td><input type="text" class="form-control"  placeholder="Enter Link" name="link[]" value="{{ $row }}"></td>
              </tr> 
              @endforeach

            </table>  
            <button type="button" name="add" id="add" class="btn btn-success col-12">Add More</button>
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
     <h5><a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">{{ __('Profile') }}</a></h5>
     <hr>
     <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
      <img class="img-fluid" id="preview" src="{{ asset($info->meta->preview ?? 'admin/img/img/placeholder.png') }}" alt=""></a>
     
    </a>

    </div>
  </div>
</div>



</div>

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
    var i=1;  
    $('#add').on('click',function(){ 
      i++;  
      $('#dynamic_field').append('<tr class="row'+i+'"><td>Social '+ i +'</td></tr><tr class="row'+i+'"><td><input type="text" name="icon[]" placeholder="fa fa-facebook" class="form-control name_list" /></td></tr><tr class="row'+i+'"><td> <input class="form-control" type="text"  placeholder="Link" name="link[]"/> </td></tr><tr class="row'+i+'"><td> <button type="button" name="remove" id="'+i+'" class="btn btn_remove col-12">Remove</button> </td></tr>');  
    });  
    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('.row'+button_id+'').remove();  
    });  



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