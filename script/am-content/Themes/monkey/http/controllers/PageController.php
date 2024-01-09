<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
/**
 * 
 */
class PageController extends controller
{
	public function index($slug)
	{
		$info=Terms::with('post')->where('slug',$slug)->first();
		if (empty($info)) {
			abort(404);
		}
		return view('theme::page.index',compact('info'));
	}
}