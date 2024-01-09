<?php 
namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Options;
use App\Terms;
/**
 * 
 */
class OptionController extends controller
{

	public function index()
	{
		$info=Options::where('key','monkey_theme_options')->first();
		return view('theme::admin.option',compact('info'));
	}

	public function count(Request $request)
	{
		
		$val=Terms::find($request->id);
		$val->count=$val->count+1;
		$val->save();
	}


}

 ?>