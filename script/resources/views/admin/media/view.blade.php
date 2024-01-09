<div class="loading"></div>
<div class="card" >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-6">
						<h4>{{ __('Media List') }}</h4>
					</div>
					<div class="col-lg-6">
						<form method="post" id="form" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
                             @csrf
							<div class="media-header-link f-right">
								<a href="javascript:void(0)"><label for="mediaUp"><span class="flaticon-cloud-computing"></span></label></a>
								<input type="file" name="media[]" id="mediaUp"  class="media pull-left" multiple="" >
							</div>
						</form>
						<form  method="post" id="deleteform" action="{{ route('admin.medias.destroy') }}">
							@csrf
							<button class="btn" type="submit" ><span class="flaticon-bin"></span></button>
						</div>
						
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="media-list">
						<div class="row" id="allmedia">

							@foreach(App\Media::latest()->paginate(18) as $media)
							<div class="col-lg-2 media-hover">
								<input type="checkbox" name="id[]" id="me{{ $media->id }}" class="singleMedia1" value="{{ $media->id }}">
								<label for="me{{ $media->id }}" id="label{{ $media->id }}" onclick="active({{ $media->id }})">
									<div class="single-media text-center">
										<img  src="{{ asset($media->url) }}" alt="{{ $media->name }}">
										<div class="media-img-name">
											<span>Kitchen Island</span>
										</div>
										<div class="media-img-size">
											<p>{{ $media->size }}</p>
										</div>
									</div>
								</label>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>