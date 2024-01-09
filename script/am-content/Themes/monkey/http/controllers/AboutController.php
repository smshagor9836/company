<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 
 */
class AboutController extends controller
{
	public function index()
	{
		return view('theme::about.index');
	}
}