@if ($childrens)
  	<li  class="{{ $li }}" >
  			@if($icon_position=='left') <i class="{{ $childrens->icon }}"></i> @endif
  			<a href="{{ url($childrens->href) }}" @if(!empty($childrens->target)) target={{ $childrens->target }} @endif>{{ $childrens->text }}</a> @if($icon_position=='right') <i class="{{ $childrens->icon }}"></i>@endif
		@if (isset($childrens->children)) 
		<ul  class="{{ $ul }}" >
			@foreach($childrens->children as $row)
			 @include('helper.menu.child', ['childrens' => $row])
			@endforeach
		</ul>	
		@endif
	</li>
@endif


