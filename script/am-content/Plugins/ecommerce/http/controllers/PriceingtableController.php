<?php 

namespace Amcoders\Plugin\ecommerce\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Meta;
use App\Productmeta;
use App\Options;
use Auth;
class PriceingtableController extends Controller
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
           $posts=Terms::with('user')->where('type',2)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::with('user')->where('type',2)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('plugin::admin.pricingtable.index',compact('posts','status','ecom'));
            }
            else{
               $posts=Terms::with('user')->where('type',2)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('plugin::admin.pricingtable.index',compact('posts','status','ecom')); 
           }
           
       }
        else{
          $posts=Terms::with('user','productMeta')->where('type',2)->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;
        return view('plugin::admin.pricingtable.index',compact('posts','status','ecom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('plugin::admin.pricingtable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $term = new Terms;
        $term->title=$request->title;
        $term->status=$request->status;
        $term->type=$request->type;
        $term->auth_id=Auth::id();
        $term->slug=str_replace(" ", "-", strtolower($request->title));
        $term->save();

        $json['duration']=$request->duration;
        $json['link']=$request->link;
        $json['service']=$request->service;
        $json['active']=$request->active;

        $meta = new Meta;
        $meta->term_id=$term->id;
        $meta->excerpt=json_encode($json);
        $meta->save();

        $productmeta = new Productmeta;
        $productmeta->term_id=$term->id;
        $productmeta->s_price=$request->s_price;
        $productmeta->p_price=$request->p_price;
        $productmeta->tax=$request->tax;
        $productmeta->save();

        return response()->json(['Service Created']);



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
        $info=Terms::with('productMeta','meta')->find($id);
        $json=json_decode($info->meta->excerpt);
       
        return view('plugin::admin.pricingtable.edit',compact('info','json'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $term =  Terms::find($id);
        $term->title=$request->title;
        $term->status=$request->status;
        $term->type=$request->type;
        $term->auth_id=Auth::id();
        $term->slug=str_replace(" ", "-", strtolower($request->title));
        $term->save();

        $json['duration']=$request->duration;
        $json['link']=$request->link;
        $json['service']=$request->service;
        $json['active']=$request->active;

        $meta =  Meta::where('term_id',$id)->first();
        $meta->term_id=$term->id;
        $meta->excerpt=json_encode($json);
        $meta->save();

        $productmeta =  Productmeta::where('term_id',$id)->first();
        $productmeta->term_id=$term->id;
        $productmeta->s_price=$request->s_price;
        $productmeta->p_price=$request->p_price;
        $productmeta->tax=$request->tax;
        $productmeta->save();

        return response()->json(['Service Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
}
