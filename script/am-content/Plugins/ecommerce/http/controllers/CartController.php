<?php 

namespace Amcoders\Plugin\ecommerce\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Options;
use Cart;

/**
 * 
 */
class CartController extends controller
{
	public function store(Request $request)
	{
     	$product = Terms::with('meta','productMeta')->where('id',$request->id)->first();
		$cart = Cart::add($product->id, $product->title, $request->qty, $product->productMeta->s_price, 550);
		
		Cart::setTax($cart->rowId, $product->tax);
		return response()->json('ok');
	}

	public function pricingstore(Request $request,$id)
	{
		 $product = Terms::with('meta','productMeta')->where('id',$id)->first();
		
		$cart = Cart::add($product->id, $product->title, 1, $product->productMeta->s_price, 550);
		Cart::setTax($cart->rowId, $product->tax);
		return redirect()->route('cart.index');
	}

	public function remove(Request $request)
	{
		Cart::remove($request->id);

		return "ok";
	}

	public function update(Request $request)
	{
		Cart::update($request->id, $request->qty);
		return Cart::count();
	}

	public function wishlist_store(Request $request)
	{
		 $product = Terms::with('meta','productMeta')->where('id',$request->id)->first();

		$cart = Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->productMeta->s_price, 550);
		return response()->json('ok');
	}

	public function compare_store(Request $request)
	{
		 $product = Terms::with('meta','productMeta')->where('id',$request->id)->first();

		$cart = Cart::instance('compare')->add($product->id, $product->title, 1, $product->productMeta->s_price, 550);
		return response()->json('ok');
	}
}