<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cart;
/**
 * 
 */
class PaymentController extends controller
{
	public function index($data)
	{
		$data = Order::where('id',decrypt($data))->first();
		return view('theme::payment.index',compact('data'));
	}

	public function store(Request $request)
	{

		if($request->method == 'stripe'){
			$charge = Stripe::charges()->create([
	        	'amount' => $request->amount,
	            'currency' => $request->currency,
	            'source' => $request->stripeToken,
	           	'description' => 'Order',
	           	'receipt_email' => $request->email,
	            'metadata' => [
	           	'quantity' => 3,
	           ],
	       	]);
	            

	        if ($charge['status'] != 'succeeded') {
	           return response()->json('transaction failed',401);
	        } 

	        $order = Order::where('id',$request->order_id)->first();
	      	$arr = json_decode($order->oder_data,true);
	       	$arr['receipt_url']=$charge['receipt_url'];
	       	$arr['status']=$charge['status'];
	       	$arr['receipt_email']=$charge['receipt_email'];
	       	$order->order_method='Stripe';
	       	$order->oder_data = json_encode($arr);
	       	$order->save();

	        Cart::destroy();

	       	return redirect()->route('orderconfirm');
		}

		Cart::destroy();
		return "confirm";

	}
}