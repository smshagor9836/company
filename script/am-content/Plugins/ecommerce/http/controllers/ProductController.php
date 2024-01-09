<?php

namespace Amcoders\Plugin\ecommerce\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Terms;
use App\Meta;
use App\Post;
use App\PostCategory;
use App\Productmeta;
use App\Options;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $settings=Options::where('key','ecommerce')->first();
       $ecom=json_decode($settings->value);
       
        
        if($request->src) {
           $posts=Terms::with('user','categories','productMeta','meta')->where('type',3)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::with('user','categories','productMeta','meta')->where('type',3)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('plugin::admin.product.index',compact('posts','status','ecom'));
            }
            else{
               $posts=Terms::with('user','categories','productMeta','meta')->where('type',3)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('plugin::admin.product.index',compact('posts','status','ecom')); 
           }
           
       }
        else{
          $posts=Terms::with('user','categories','productMeta','meta')->where('type',3)->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;
        return view('plugin::admin.product.index',compact('posts','status','ecom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plugin::admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            
        ]);


        $creat_slug=Str::slug($request->title);
        $check=Terms::where('slug',$creat_slug)->count();
        if ($check != 0) {
            $slug=$creat_slug.'-'.$check;
        }
        else{
            $slug=$creat_slug;
        }

        


        $post=new Terms;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->type=3;
        $post->auth_id=Auth::id();
        $post->tags=$request->tag;
        
        $post->status=$request->status;
        $post->save();

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->preview=$request->preview;
        $post_meta->gallery=$request->gallery;
        $post_meta->excerpt=$request->excerpt;
        $post_meta->save();

        if ($request->category) {
            
         foreach ($request->category as $cat_row) {
           
                $cat= new PostCategory;
                $cat->term_id=$post->id;
                $cat->category_id=$cat_row;
                $cat->save();
          

         }
        }

        $postdetail=new Post;
        $postdetail->term_id=$post->id;
        $postdetail->post_type=$request->post_type;
        $json['content']=$request->content;
        $json['information']=$request->information;

        $postdetail->content=json_encode($json);
        $postdetail->comment_status=$request->comment_status;
        $postdetail->save();


        $productmeta = new Productmeta;
        $productmeta->term_id=$post->id;
        $productmeta->qty=$request->qty;
        $productmeta->sku=$request->sku;
        $productmeta->stock_status=$request->stock_status;
        $productmeta->s_price=$request->s_price;
        $productmeta->p_price=$request->p_price;
        $productmeta->tax=$request->tax;
        $productmeta->save();
       

        return response()->json('Product Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $info=Terms::with('meta','post','categories','productMeta')->find($id);   
     
       $img_array= explode(",", $info->meta->gallery);
        $json=json_decode($info->post->content);
       return view('plugin::admin.product.edit',compact('info','img_array','json'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

         $validatedData = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|max:100',
            
        ]);
         $slug= Terms::where('slug',$request->slug)->where('type',3)->where('id','!=',$id)->first();
        if (!empty($slug)) {
            return response()->json(['Slug Must Be unique'],401);
        }

      

        $post= Terms::find($id);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->type=3;
        $post->auth_id=Auth::id();
        $post->tags=$request->tag;
        $post->status=$request->status;
        $post->save();

        $post_meta =  Meta::where('term_id',$id)->first();
        if (!empty($post_meta)) {
          $post_meta->term_id=$post->id;
          $post_meta->preview=$request->preview;
          $post_meta->gallery=$request->gallery;
          $post_meta->excerpt=$request->excerpt;
          $post_meta->save();
        }
       
        $postdetail= Post::where('term_id',$id)->first();
        if (!empty($postdetail)) {
            $postdetail->term_id=$post->id;
            $postdetail->post_type=$request->post_type;
            $json['content']=$request->content;
            $json['information']=$request->information;

            $postdetail->content=json_encode($json);
            $postdetail->comment_status=$request->comment_status;
            $postdetail->save();

        }
        


        if ($request->category) {
          PostCategory::where('term_id',$id)->delete();    
         foreach ($request->category as $cat_row) {
            if ($cat_row != 0) {
                $cat= new PostCategory;
                $cat->term_id=$id;
                $cat->category_id=$cat_row;
                $cat->save();
            }

         }
        }

        $productmeta =  Productmeta::where('term_id',$id)->first();
        $productmeta->term_id=$post->id;
        $productmeta->qty=$request->qty;
        $productmeta->sku=$request->sku;
        $productmeta->stock_status=$request->stock_status;
        $productmeta->s_price=$request->s_price;
        $productmeta->p_price=$request->p_price;
        $productmeta->tax=$request->tax;
        $productmeta->save();
      
       

        return response()->json('Product updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if ($request->status=='publish') {
            if ($request->ids) {

                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=1;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='trash') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=0;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   Terms::destroy($id);
                   
                }
            }
        }
        return response()->json('Success');

    }


    public function settingView()
    {
       $info=Options::where('key','ecommerce')->first(); 
       $info=json_decode($info->value);
       return view('plugin::admin.ecommerce_Settings',compact('info'));
    }

    public function settingsUpdate(Request $request)
    {
        $ecommerce=Options::where('key','ecommerce')->first(); 
        $arr['shipping']=$request->shipping;
        $arr['icon']=$request->icon;
        $arr['currency']=strtoupper($request->currency);
        $arr['tax']=$request->tax;

       
        $ecommerce->key = 'ecommerce';
        $ecommerce->value = json_encode($arr);
        $ecommerce->save();
        return response()->json(['Settings Updated']);



    }
}
