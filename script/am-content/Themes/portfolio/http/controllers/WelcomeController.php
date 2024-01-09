<?php 

namespace Amcoders\Theme\portfolio\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Terms;
use Amcoders\Plugin\contactform\Contact;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
class WelcomeController extends controller
{
	public function index()
	{
		$seo=LpOption('seo');
		
		SEOMeta::setTitle($seo->title);
		SEOMeta::setDescription($seo->description);
		SEOMeta::setCanonical($seo->canonical);

		OpenGraph::setDescription($seo->description);
		OpenGraph::setTitle($seo->title);
		OpenGraph::setUrl(url('/'));
		OpenGraph::addProperty('keywords', $seo->tags);

		TwitterCard::setTitle($seo->title);
		TwitterCard::setSite($seo->twitterTitle);

		JsonLd::setTitle($seo->title);
		JsonLd::setDescription($seo->description);
		JsonLd::addImage(asset(content('header','header_logo')));
		$categories=Category::where('type',8)->wherehas('portfolio')->latest()->get();
		$portfolios=Terms::where('type',8)->where('status',1)->with('portfolioCategory','meta')->latest()->take(40)->get();
		return view('theme::welcome.home',compact('categories','portfolios'));
	}

	public function contact(Request $request)
	{
		Contact::send($request->name,$request->email,$request->subject,$request->message);

		return response()->json('ok');
	}
}