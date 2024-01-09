<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Amcoders\Plugin\contactform\Contact;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
/**
 * 
 */
class ContactController extends controller
{
	public function index()
	{
		$title=content('contact','contact_title');
		$description=content('contact','contact_des');
		$bg_img=asset(content('contact_breadcrumb','contact_breadcrumb_bg_img'));

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

		return view('theme::contact.index',compact('title','description','bg_img'));
	}

	public function store(Request $request)
	{
		Contact::send($request->name,$request->email,$request->email,$request->message);

		return response()->json('ok');
	}
}