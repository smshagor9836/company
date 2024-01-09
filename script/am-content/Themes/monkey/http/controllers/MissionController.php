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
class MissionController extends controller
{
	public function index()
	{
		$title=content('mission','mission_title');
		$description=content('mission','mission_des');
		$bg_img=asset(content('mission','mission_img'));
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
		return view('theme::mission.index',compact('title','description','bg_img'));
	}
}