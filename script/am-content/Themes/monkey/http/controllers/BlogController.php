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
class BlogController extends controller
{

	public function index()
	{
		$bg_img=asset(content('blog_breadcrumb','blog_breadcrumb_bg_img'));
		$title=content('blog_breadcrumb','blog_breadcrumb_title');
		SEOMeta::setTitle($title);
        
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->current());
    

        TwitterCard::setTitle($title);
       

        JsonLd::setTitle($title);
        
        JsonLd::addImage($bg_img);

		$recent_posts = Terms::with('meta','post')->where('type',0)->latest()->take(3)->get();
		$categories = Category::where([
						    ['type', 0],
						    ['status',1],
						])->latest()->get();
		$blogs = Terms::with('meta','post')->where('type',0)->latest()->paginate(6);
		return view('theme::blog.index',compact('blogs','recent_posts','categories','bg_img','title'));
	}

	public function show($slug)
	{
		$recent_posts = Terms::with('meta','post')->where('type',0)->latest()->take(3)->get();
		$categories = Category::where([
						    ['type', 0],
						    ['status',1],
						])->latest()->get();
		$blog = Terms::with('meta','post')->where('slug',$slug)->first();

		SEOMeta::setTitle($blog->title);
        SEOMeta::setDescription($blog->excerpt);
        SEOMeta::addMeta('article:published_time', $blog->created_at->toW3CString(), 'property');
        
        SEOMeta::addKeyword([$blog->tags]);

        OpenGraph::setDescription($blog->meta->excerpt);
        OpenGraph::setTitle($blog->title);
        OpenGraph::setUrl(url()->current());
        

        OpenGraph::addImage(asset($blog->meta->preview));
        OpenGraph::addImage(['url' => asset($blog->meta->preview), 'size' => 300]);
        OpenGraph::addImage(asset($blog->meta->preview), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($blog->title);
        JsonLd::setDescription($blog->excerpt);
      
        JsonLd::addImage(asset($blog->meta->preview));


		return view('theme::blog.show',compact('blog','recent_posts','categories'));
	}


	public function search(Request $request)
	{
		$recent_posts = Terms::with('meta','post')->where('type',0)->latest()->take(3)->get();
		$categories = Category::where([
						    ['type', 0],
						    ['status',1],
						])->latest()->get();
		$search = $request->search;
		$blogs = Terms::with('meta','post')->where('title', 'LIKE', "%{$search}%")->where('type',0)->get();
		SEOMeta::setTitle($search);
        
        OpenGraph::setTitle($search);
        OpenGraph::setUrl(url()->current());
    

        TwitterCard::setTitle($search);
       

        JsonLd::setTitle($search);
        
       
		return view('theme::tag.show',compact('blogs','recent_posts','categories','search')); 
	}


	public function category($slug)
	{
		return $posts=Category::with('posts')->where('slug',$slug)->get();

		return $slug;
	}
}