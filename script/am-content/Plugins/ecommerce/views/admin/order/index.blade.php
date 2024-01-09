@extends('layouts.backend.app')

@section('content')
<div class="card"  >
	<div class="card-body">

		<div class="card-action-filter">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="cart-filter mb-20">
						<a href="{{ route('admin.ecommerce.order.index') }}">{{ __('All') }} <span>({{ App\Order::count() }})</span></a>
						<a href="?st=Completed">{{ __('Completed') }} <span>({{ App\Order::where('order_status','Completed')->count() }})</span></a>
						<a href="?st=Pending">{{ __('Pending') }} <span>({{ App\Order::where('order_status','Pending')->count() }})</span></a>
						<a href="?st=Cancelled" class="trash">{{ __('Cancelled') }} <span>({{ App\Order::where('order_status','Cancelled')->count() }})</span></a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="single-filter f-right">
						<div class="form-group">
							<form>
								<input type="text" id="data_search" class="form-control" name="src" placeholder="Enter Order Id" value="{{ $src ?? '' }}">
							</form>
						</div>
					</div>
				</div>
			</div>


		</div>
		<div class="table-responsive custom-table">
			<table class="table">
				<thead>
					<tr>

						<th class="am-title">{{ __('Order ID') }}</th>
						<th class="am-title">{{ __('Order Status') }}</th>
						<th class="am-title">{{ __('Order Method') }}</th>
						<th class="am-title">{{ __('Amount') }}</th>

						<th class="am-date">{{ __('Order Created') }}</th>
						<th class="am-date">{{ __('Action') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $post)
					@php
					$order_data=json_decode($post->oder_data);
					@endphp
					<tr>

						<td>
							<a href="{{ route('admin.ecommerce.order.show',$post->id) }}">#{{ $post->id }}</a>
							<div class="hover">
								@if(isset($order_data->receipt_url))
								<a href="{{ $order_data->receipt_url }}" target="_blank">Payment Receipt</a>
								@endif
								<a href="{{ route('admin.ecommerce.order.show',$post->id) }}" class="last">{{ __('Invoice') }}</a>
							</div>
						</td>
						<td>
							<?php
							if($post->order_status=='Pending'){
								$color="text-warning";
							}
							elseif($post->order_status=='Processing'){
								$color="text-info";
							}
							elseif($post->order_status=='On hold'){
								$color="text-primary";
							}
							elseif($post->order_status=='Completed'){
								$color="text-success";
							}
							else{
								$color="text-danger";
							}

							?>
							<p class="{{ $color }}">{{ $post->order_status }}</p>

						</td>
						<td>
							{{ $post->order_method }}
						</td>
						<td>
							<i class="{{ $ecom->icon }}"></i> {{ $post->amount }}
						</td>

						<td>
							<div class="date">
								{{ $post->updated_at->diffForHumans() }}<br>
								{{ $post->updated_at->format('d-F-Y') }}
							</div>
						</td>
						<td>
							@if($post->order_status !== 'Completed')
							<select class="form-control" id="status{{ $post->id }}" onchange="status('{{ $post->id }}')">
								<option value="Pending" @if($post->order_status=='Pending') disabled selected @endif>Pending</option>
								<option value="Processing" @if($post->order_status=='Processing') disabled selected @endif>Processing </option>
								<option value="Completed" @if($post->order_status=='Completed') disabled selected @endif>Completed  </option>
								<option value="On hold" @if($post->order_status=='On hold') disabled selected @endif>On hold</option>
								<option value="Canceled" @if($post->order_status=='Canceled') disabled selected @endif>Canceled</option>
							</select>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
				
				<tfoot>
					<tr>
						
						<th class="am-title">{{ __('Order ID') }}</th>
						<th class="am-title">{{ __('Order Status') }}</th>
						<th class="am-title">{{ __('Order Method') }}</th>
						<th class="am-title">{{ __('Amount') }}</th>

						<th class="am-date">{{ __('Order Created') }}</th>
						<th class="am-date">{{ __('Action') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $orders->links() }}

		</div>
	</div>
</div>
<form method="post" action="{{ route('admin.ecommerce.order.store') }}" id="basicform">
	@csrf
	<input type="hidden" name="id" id="id">
	<input type="hidden" name="status" id="status">
	<button type="submit" class="none" id="submit"></button>
</form>
@endsection
@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";	
	//response will assign this function
	function success(res){
		location.reload();
	}
	
	function status(id) {
		var val = $('#status'+id).val();
		$('#id').val(id);
		$('#status').val(val);
		$('#submit').click();
	}	
</script>
@endsection