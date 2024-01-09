@extends('layouts.backend.app')

@section('content')
@php 
$ecom_settings=LpOption('ecommerce');
$oder_data=json_decode($orders->oder_data);
@endphp
<div class="card">
	<div class="card-body">
		<div class="invoice-title">
			<div class="order-number f-right">
				<h4>{{ __('Order #') }} {{ $orders->id }}</h4>
			</div>
			<div class="invoice-logo">
				<img src="{{ asset(content('header','header_logo')) }}">
			</div>	
		</div><br>
		<div class="row">
			<div class="billing-info">
				<address>
					<strong>{{ __('Billed To') }}:</strong><br>
					{{ __('Name') }}: <b>{{ $oder_data->name }}</b> <br>
					{{ __('Email') }}: <b>{{ $oder_data->email }}</b> <br>
					{{ __('Phone') }}: <b>{{ $oder_data->phone }}</b> <br>
					{{ __('Address 1') }}: <b>{{ $oder_data->street_address_1 }}</b> <br>
					{{ __('Address 2') }}: <b>{{ $oder_data->street_address_2 }}</b> <br>
					{{ __('City') }}: <b>{{ $oder_data->city }}</b> <br>
					{{ __('State') }}: <b>{{ $oder_data->state }}</b> <br>
					
				</address>
			</div>
		</div>
		<div class="row">
			<div class="billing-info">
				<address>
					<strong>{{ __('Payment Gateway') }}:</strong><br>
					 {{ $orders->order_method }} <br>
					 
				</address>
			</div>
			<div class="billing-info justify-address">
				<address>
					<strong>{{ __('Order Date') }}:</strong><br>
					{{ $orders->created_at->isoFormat('LL') }}
				</address>
			</div>
		</div>
		<div class="row">
			<div class="order-summery">
				<h6><strong>{{ __('Order summary') }}</strong></h6>
				<div class="custom-table table-responsive">
					<table class="table table-nowrap">
						<thead>
							<tr>
								<th style="width: 70px;">{{ __('No') }}.</th>
								<th>{{ __('Item') }}</th>
								<th class="text-right">{{ __('Price') }}</th>
								<th class="text-right">{{ __('Quantity') }}</th>
								<th class="text-right">{{ __('Tax') }}</th>
								<th class="text-right">{{ __('subtotal') }}</th>
							</tr>
						</thead>
						<tbody>

							@foreach($orders->ordermeta as $key => $row)
							@php
							$data=json_decode($row->item_meta);

							@endphp
							<tr>
								<td>{{ $key+1 }}</td>
								<td><a  @if(\App\Terms::find($row->term_id)->type == 2)  href="{{ route('admin.ecommerce.pricing.edit',$row->term_id) }}"  @else href="{{ route('admin.ecommerce.product.edit',$row->term_id) }}" @endif>{{ \App\Terms::find($row->term_id)->title }}</a></td>
								<td class="text-right"><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($data->price,2) }}</td>
								<td class="text-right">{{ $data->qty }}</td>
								<td class="text-right"><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($data->tax,2) }}</td>
								<td class="text-right"><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($data->subtotal,2) }}</td>
							</tr>
							@endforeach

							<tr>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td colspan="2" class="border-0 text-right">
									<strong class="text-right">{{ __('Tax') }}</strong>
								</td>
								<td class="border-0 text-right">
									<h4 class="m-0"><i class="{{ $ecom_settings->icon }}"></i>{{ $orders->tax }}</h4></td>
								</tr>
								@php 
								$ecom_settings=LpOption('ecommerce');
								@endphp
								<tr>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td colspan="2" class="border-0 text-right">
									<strong class="text-right">{{ __('Shipping') }}</strong>
								</td>
								<td class="border-0 text-right">
									<h4 class="m-0"><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($ecom_settings->shipping,2) }}</h4></td>
								</tr>
								<tr>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td class="border-0"></td>
								<td colspan="2" class="border-0 text-right">
									<strong class="text-right">Total</strong>
								</td>
								<td class="border-0 text-right">
									<h4 class="m-0"><i class="{{ $ecom_settings->icon }}"></i>{{ number_format($orders->amount + $ecom_settings->shipping,2) }}</h4></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-md-6">{{ __('Order Note') }}: <p>{{ $oder_data->note }}</p> </div>
				<div class="col-md-6"><div class="print-btn">
				<a href="#" onclick="window.print()" class="btn print-btn f-right"><i class=""></i> {{ __('Print') }}</a>
			</div></div>
				
			</div>
			
		</div>
	</div>
	@endsection