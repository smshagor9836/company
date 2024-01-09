<?php 

namespace Amcoders\Theme\monkey\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Customaizer;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use DB;

/**
 * 
 */
class WelcomeController extends controller
{
    public function index()
    {

        try {
          DB::connection()->getPdo();
          if(DB::connection()->getDatabaseName()){
             $seo=LpOption('seo');
             $basic_info=LpOption('system_basic_info');
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
             $pricings = Terms::with('meta','productMeta')->where('type',2)->latest()->take(3)->get();
             return view('theme::welcome.home',compact('pricings'));
         }else{
            return redirect()->route('install');
        }
    } catch (\Exception $e) {
        return redirect()->route('install');
    } 
}

}