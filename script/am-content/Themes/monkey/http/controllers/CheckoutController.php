<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Order;
use App\Orderitem;
use Cart;
use Auth;
/**
 * 
 */
class CheckoutController extends controller
{
	public function index()
	{
      
		return view('theme::checkout.index');
	}

	public function store(Request $request)
	{
       
       
      
           
      //       $charge = Stripe::charges()->create([
      //           'amount' => $request->amount,
      //           'currency' => $request->currency,
      //           'source' => $request->stripeToken,
      //           'description' => 'Order',
      //           'receipt_email' => $request->email,
      //           'metadata' => [
      //           	'quantity' => 3,
      //           ],
      //       ]);
            

      //       if ($charge['status'] != 'succeeded') {
      //          return response()->json('transaction failed',401);
      //       } 
      
      // $arr['receipt_url']=$charge['receipt_url'];
      // $arr['status']=$charge['status'];
      // $arr['receipt_email']=$charge['receipt_email'];
      $arr1['currency']=$request->currency;
      $arr1['name']=$request->name;
      $arr1['email']=$request->email;
      $arr1['phone']=$request->phone;
      $arr1['street_address_1']=$request->street_address_1;
      $arr1['street_address_2']=$request->street_address_2;
      $arr1['city']=$request->city;
      $arr1['state']=$request->state;
      $arr1['note']=$request->note;
      

      $order = new Order;
      //$order->user_id=Auth::id();
      $order->order_status='Pending';
      $order->order_method='Paypal';
      $order->amount=$request->amount;
      $order->tax=$request->tax;
      $order->oder_data=json_encode($arr1);
      $order->save();

      foreach(Cart::content() as $row) {
        $ar['qty']=$row->qty;
        $ar['price']=$row->price;
        $ar['tax']=$row->tax;
        $ar['subtotal']=$row->subtotal;

       $item = new Orderitem;
       $item->term_id=$row->id;
       $item->order_id =$order->id;
       $item->item_meta =json_encode($ar);
       $item->save();
      }  

      // Cart::destroy();
    
      return redirect()->route('payment.index',encrypt($order->id));
	}

  public function orderconfirm()
  {
     return view('theme::orderconfirm');
  }

}