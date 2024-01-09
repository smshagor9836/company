@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('Metting List') }}</h4>
			</div>
			<div class="col-lg-6">
				<div class="single-filter f-right">
					<div class="form-group">
						
						<input type="text" id="data_search" class="form-control" placeholder="Enter Value">
						
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table">
				<thead>
					<tr>
						<th class="am-title">{{ __('Title') }}</th>
						<th class="am-author">{{ __('Live Class') }}</th>
						<th class="am-tags">{{ __('Status') }}</th>
						<th class="am-tags">{{ __('Duration') }}</th>
						<th class="am-tags">{{ __('Date') }}</th>
						<th class="am-date">{{ __('Start Time') }}</th>
						<th class="am-date">{{ __('Action') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($meetings as $value)
					<tr>
						<td>
							{{ $value->title }}
						</td>
						<td>{{ $value->meeting_id }}</td>
						<td>
							@if($value->status == 'started')
							Live
							@else
							upcoming
							@endif
						</td>
						<td>{{ $value->duration }} minutes</td>
						@if(isset($value->start_time))
						<td>
							@php
							$main_date = str_replace("T", " ", $value->start_time);
							$final_date = substr($main_date, 0,-4);
							@endphp
							{{ Carbon\Carbon::parse($final_date)->isoFormat('ll') }}
						</td>
						@else
						<td>null</td>
						@endif
						@if(isset($value->start_time))
						<td>{{ Carbon\Carbon::parse($final_date)->isoFormat('LT') }}</td>
						@else
						<td>null</td>
						@endif
						<td>
							@if($value->status == 'started')
							<a class="live_btn" href="{{ route('zoom.view',$value->meeting_id) }}">{{ __('Join Live') }}</a>
							@else
							null
							@endif
						</td>
					</tr>
					@endforeach

				</tbody>

				<tfoot>
					<tr>
						<th class="am-title">{{ __('Title') }}</th>
						<th class="am-author">{{ __('Live Class') }}</th>
						<th class="am-tags">{{ __('Status') }}</th>
						<th class="am-tags">{{ __('Duration') }}</th>
						<th class="am-tags">{{ __('Date') }}</th>
						<th class="am-date">{{ __('Start Time') }}</th>
						<th class="am-date">{{ __('Action') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $meetings->links() }}
		</div>
	</div>
</div>

@endsection


