<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Terms;
use App\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
/**
 * 
 */
class TagController extends controller
{
	public function show($slug)
	{
		$recent_posts = Terms::with('meta','post')->where('type',0)->latest()->take(3)->get();
		$categories = Category::where([
						    ['type', 0],
						    ['status',1],
						])->latest()->get();
		$blogs = Terms::with('meta','post')->where('tags', 'LIKE', "%{$slug}%")->paginate(6);
		$search = '';
		OpenGraph::setTitle($slug);
		SEOMeta::setTitle($slug);
        OpenGraph::setUrl(url()->current());
        TwitterCard::setTitle($slug);
        JsonLd::setTitle($slug);
		return view('theme::tag.show',compact('blogs','recent_posts','categories','search','slug')); 
	}
}