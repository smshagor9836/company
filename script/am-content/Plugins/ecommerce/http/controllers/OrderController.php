<?php 

namespace Amcoders\Plugin\ecommerce\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Orderitem;
use App\Options;
use App\Productmeta;
/**
 * 
 */
class OrderController extends controller
{
	public function index(Request $request)
	{
		$settings=Options::where('key','ecommerce')->first();
		 $ecom=json_decode($settings->value);


		if (!empty($request->st)) {
			$orders=Order::where('order_status',$request->st)->latest()->paginate(50);
		}
		elseif (!empty($request->src)) {
			$orders=Order::where('id',$request->src)->latest()->paginate(50);
			$src=$request->src;
			return view('plugin::admin.order.index',compact('orders','src','ecom'));
		}
		else{
			$orders=Order::latest()->paginate(50);
		}
		
		return view('plugin::admin.order.index',compact('orders','ecom'));
	}

	public function store(Request $request)
	{
		$orders=Order::with('ordermeta')->find($request->id);
		$orders->order_status=$request->status;
		$orders->save();

		if ($request->status=='Completed') {
			
			foreach ($orders->ordermeta as $key => $value) {
				
				$meta=Productmeta::where('term_id',$value->term_id)->first();
				$data=json_decode($value->item_meta);
				$meta->qty=$meta->qty-$data->qty;
				$meta->save();
			}
		}
		elseif($request->status=='Canceled'){
			if ($orders->order_status=='Completed') {
				foreach ($orders->ordermeta as $key => $value) {
					$meta=Productmeta::where('term_id',$value->term_id)->first();
					$data=json_decode($row->item_meta);
					$meta->qty=$meta->qty+$data->qty;
					$meta->save();
				}
			}
			
		}

		return response()->json(['updated'],200);
	}
	public function show($id)
	{
		$orders=Order::with('ordermeta')->find($id);
		return view('plugin::admin.order.show',compact('orders'));
	}

	public function edit($id)
	{
		$orders=Order::with('ordermeta')->find($id);
		return view('plugin::admin.order.edit',compact('orders'));

		
	}
}