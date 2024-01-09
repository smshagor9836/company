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
class TeamController extends controller
{
	public function index()
	{
		$title=content('team','team_title');
		$description=content('team','team_des');
		$bg_img=asset(content('team_breadcrumb','team_breadcrumb_bg_img'));

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

		return view('theme::team.index',compact('bg_img','title','description'));
	}
}