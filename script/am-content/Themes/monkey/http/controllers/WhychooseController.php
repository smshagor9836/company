<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
/**
 * 
 */
class WhychooseController extends controller
{
	public function index()
	{
		$bg_img= asset(content('whychosse_breadcrumb','whychosse_breadcrumb_bg_img'));
		$title=content('service','service_title');
		$description=content('service','service_des');


		SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        

        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->current());
    

        TwitterCard::setTitle($title);
        TwitterCard::setSite($description);

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addImage($bg_img);
		

		return view('theme::whychoose.index',compact('bg_img','description','title'));
	}
}