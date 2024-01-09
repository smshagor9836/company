<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 
 */
class CartController extends controller
{
	public function index()
	{
		return view('theme::cart.index');
	}
}