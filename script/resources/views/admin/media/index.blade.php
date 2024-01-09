@section('style')

@endsection
@extends('layouts.backend.app')

@section('content')
<div class="card" >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-8">
						<div class="d-flex">
							<h4 class="mr-3">{{ __('Media List') }} </h4>
							<p class="errors"></p>
						</div>
					</div>
					<div class="col-lg-4">
						<form method="post" id="form" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="media-header-link f-right">
								<a href="javascript:void(0)"><label for="mediaUp"><i class="fas fa-cloud-upload-alt"></i></label></a>
								<input type="file" name="media[]" id="mediaUp"  class="media  none" multiple="" >
							</form>
							<form  method="post" id="deleteform" action="{{ route('admin.medias.destroy') }}">
								@csrf
								<button  type="submit" ><i class="fas fa-trash-alt"></i></button>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="scroll-bar-wrap">
									<div class="media-list">
										<div class="row" id="allmedia">
											<input type="hidden" id="murl" value="{{ route('admin.medias.json') }}">
											<input type="hidden" id="last_id" value="">
											@foreach(App\Media::latest()->paginate(18) as $media)
											<div class="col-lg-2 media-hover">
												<input type="checkbox" name="id[]" id="me{{ $media->id }}" class="singleMedia1" value="{{ $media->id }}">
												<label for="me{{ $media->id }}" id="media-level{{ $media->id }}" onclick="active({{ $media->id }})">
													<div class="single-media text-center">
														<img  src="{{ asset($media->url) }}" alt="{{ $media->name }}">

														<div class="media-img-size">
															<p>{{ $media->size }}</p>
														</div>
													</div>
												</label>
											</div>
											@endforeach
										</div>
										
										<p class="text-center"><button class="view-more-button" type="button" id="load-more">{{ __('View more') }}</button></p>
									</div>
									<div class="cover-bar"></div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	@endsection

	@section('script')
	<script src="{{ asset('admin/js/media.js') }}"></script>
	<script type="text/javascript">
		(function ($) {
			"use strict";


			$('#load-more').on('click',function(e){
				let medialink = $('#murl').val();
				let last_id = $('#last_id').val();

				if (last_id == '') {
					var mediaurl = medialink; 

				}
				else{
					var mediaurl = medialink+'?id='+ $('#last_id').val();

				}

				$.ajax({
					type: 'get',
					url: mediaurl,
					dataType: 'json',
					success: function(response){ 
						$.each(response, function(index, value){
							$("#allmedia").append("<div class='col-lg-2 media-hover'><input type='checkbox' name='id[]' id='me"+value.id+"' class='singleMedia1' value="+value.id+"><label for='me"+value.id+"' id='media-level"+value.id+"' onclick='active("+value.id+")'>							<div class='single-media text-center'><img  src="+value.url+" >				<div class='media-img-size'><p></p></div></div></label></div>");
							$('#last_id').val(value.id)

						});
						if (response == '') {
							$('#load-more').hide();
						}

					}

				})
			});







		})(jQuery);
	</script>
	@endsection