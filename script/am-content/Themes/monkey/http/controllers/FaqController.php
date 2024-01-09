<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
/**
 * 
 */
class FaqController extends controller
{
	public function index()
	{
		$data=LpOption('faq',false,true);
		$title=$data->title;
		$description=$data->excerpt;

		SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        

        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->current());
    

        TwitterCard::setTitle($title);
        TwitterCard::setSite($description);

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addImage($data->image);

		 
		 
		return view('theme::faq.index',compact('data','title','description'));
	}
}