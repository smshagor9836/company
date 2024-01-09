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
class ProductController extends controller
{
	public function index()
	{
		$bg_img=asset(content('shop_breadcrumb','shop_breadcrumb_bg_img'));
		$title=content('shop_breadcrumb','shop_breadcrumb_title');
		SEOMeta::setTitle($title);

                OpenGraph::setTitle($title);
                OpenGraph::setUrl(url()->current());


                TwitterCard::setTitle($title);


                JsonLd::setTitle($title);
                JsonLd::addImage($bg_img);


                $products = Terms::with('meta','productMeta','categories')->where('type',3)->latest()->paginate(6);
                abort_if($products->isEmpty(),204);
                return view('theme::product.index',compact('products','bg_img','title'));
        }

        public function show(Request $request,$slug)
        {
              $product = Terms::with('meta','productMeta','post')->where('slug',$slug)->first();

              SEOMeta::setTitle($product->title);
              SEOMeta::setDescription($product->excerpt);
              SEOMeta::addMeta('article:published_time', $product->created_at->toW3CString(), 'property');

              SEOMeta::addKeyword([$product->tags]);

              OpenGraph::setDescription($product->meta->excerpt);
              OpenGraph::setTitle($product->title);
              OpenGraph::setUrl(url()->current());


              OpenGraph::addImage(asset($product->meta->preview));
              OpenGraph::addImage(['url' => asset($product->meta->preview), 'size' => 300]);
              OpenGraph::addImage(asset($product->meta->preview), ['height' => 300, 'width' => 300]);

              JsonLd::setTitle($product->title);
              JsonLd::setDescription($product->excerpt);

              JsonLd::addImage(asset($product->meta->preview));


              return view('theme::product.show',compact('product'));
      }
}