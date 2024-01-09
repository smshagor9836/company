<?php 

namespace Amcoders\Plugin\portfolio\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 
 */
class TestController extends controller
{
	public function index()
	{
		return view('plugin::test');
	}
}