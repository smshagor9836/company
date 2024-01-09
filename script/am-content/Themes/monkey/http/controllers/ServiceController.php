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
class ServiceController extends controller
{
	public function index()
	{
		$title=content('service_breadcrumb','service_breadcrumb_title');
		$bg_img=asset(content('service_breadcrumb','service_breadcrumb_bg_img'));
		SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->current());
        TwitterCard::setTitle($title);
        JsonLd::setTitle($title);
        JsonLd::addImage($bg_img);
		

		
		return view('theme::service.index',compact('title','bg_img'));
	}


	public function show($slug)
	{
		$service = Terms::with('post','meta')->where('slug',$slug)->first();
		SEOMeta::setTitle($service->title);
        SEOMeta::setDescription($service->meta->excerpt);
        

        OpenGraph::setDescription($service->meta->excerpt);
        OpenGraph::setTitle($service->title);
        OpenGraph::setUrl(url()->current());
    

        TwitterCard::setTitle($service->title);
        TwitterCard::setSite($service->meta->excerpt);

        JsonLd::setTitle($service->title);
        JsonLd::setDescription($service->meta->excerpt);
        JsonLd::addImage($service->meta->preview);
		
		return view('theme::service.show',compact('service'));
	}

	public function category($slug)
	{
		$services = Category::with('posts')->where('slug',$slug)->first()->posts;
		$service = Category::where('slug',$slug)->first();
		$bg_img=asset(content('service_breadcrumb','service_breadcrumb_bg_img'));

		SEOMeta::setTitle($service->name);
        OpenGraph::setTitle($service->name);
        OpenGraph::setUrl(url()->current());
        TwitterCard::setTitle($service->name);
        JsonLd::setTitle($service->name);
        JsonLd::addImage($bg_img);


		return view('theme::service.service_list',compact('services','service','bg_img'));
	}
}