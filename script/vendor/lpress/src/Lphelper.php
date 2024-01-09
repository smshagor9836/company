<?php 
namespace Amcoders\Lpress;
use App\Menu;
use App\Category;
use App\Options;
use Session;
class Lphelper
{
	
	public static function Menu($position,$ul='',$li='',$a='',$icon_position='top',$lang=false){

		if ($lang==false) {
			$menus=Menu::where('position',$position)->where('status',1)->where('lang','en')->first();
		}
		else{
			$menus=Menu::where('position',$position)->where('status',1)->where('lang',Session::get('locale'))->first();
		}
		return view('lphelper::lphelper.lpmenu.parent', compact('menus','ul','li','a','icon_position'));  
	}

	public static function ConfigCategory($type,$select = ''){
		$categories = Category::whereNull('p_id')->where('name','!=','Uncategorizied' )->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();
		return view('lphelper::lphelper.categoryconfig.parent', compact('categories','select')); 
	}

	public static function LPAdminCategory($type){
		$categories = Category::whereNull('p_id')->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();
		return view('lphelper::lphelper.category.categories', compact('categories')); 
	}

	public static function AdminLang($c='')
	{
		$data=Options::where('key','langlist')->select('value')->first();
		$data=json_decode($data->value);
		return view('lphelper::lphelper.lang.index',compact('data','c'));
	}

	public static function LPAdminCategoryUpdate($type,$arr = [])
	{
		$categories = Category::whereNull('p_id')->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();
		return view('lphelper::lphelper.category.category_check', compact('categories','arr'));  
	}

	public static function Disqus()
	{
		$disqus_comment=Options::where('key','disqus_comment')->select('value')->first();

		if (!empty($disqus_comment)) {
			return view('lphelper::lphelper.script.disqus-comment',compact('disqus_comment'));
		}
	}

	public static function TwkChat($param){
		return view('lphelper::lphelper.script.livechat',compact('param'));
	}


	public static function decode($token)
	{
		return base64_decode(base64_decode(base64_decode($token)));
	}
}

?>