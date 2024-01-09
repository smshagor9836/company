<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Post;
use App\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
/**
 * 
 */
class CategoryController extends controller
{
	public function show($slug)
	{
		$recent_posts = Terms::with('meta','post')->where('type',0)->latest()->take(3)->get();
		$categories = Category::where([
						    ['type', 0],
						    ['status',1],
						])->latest()->take(6)->get();
		 $blogs = Category::with('posts')->where('slug',$slug)->where('type',0)->first();
		OpenGraph::setTitle($blogs->name);
		SEOMeta::setTitle($blogs->name);
        OpenGraph::setUrl(url()->current());
        TwitterCard::setTitle($blogs->name);
        JsonLd::setTitle($blogs->name);
		return view('theme::category.show',compact('blogs','recent_posts','categories'));
	}
}