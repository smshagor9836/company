<?php

namespace Amcoders\Plugin\portfolio\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Auth;
use App\Terms;
use App\Meta;
class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->src) {
           $posts=Terms::where('type',9)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::where('type',9)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('plugin::portfolio.experience.index',compact('posts','status'));
            }
            else{
               $posts=Terms::where('type',9)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('plugin::portfolio.experience.index',compact('posts','status')); 
           }
           
       }
        else{
          $posts=Terms::where('type',9)->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;

        return view('plugin::portfolio.experience.index',compact('posts'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plugin::portfolio.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $term=new Terms;
        $term->title=$request->title;
        $term->slug=$request->duration;
        $term->tags=$request->company;
        $term->type=$request->type;
        $term->auth_id=1;
        $term->status=$request->status;
        $term->save();

        $post_meta = new Meta;
        $post_meta->term_id=$term->id;
        $post_meta->excerpt=$request->excerpt;
        $post_meta->save();

        

    return response()->json(['Experience Created']);

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
       $info=Terms::with('meta')->find($id);  
        return view('plugin::portfolio.experience.edit',compact('info'));
    

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
        
        $term=Terms::find($id);
        $term->title=$request->title;
        $term->slug=$request->duration;
        $term->tags=$request->company;
        $term->status=$request->status;
        $term->save();

        $post_meta = Meta::where('term_id',$id)->first();
        $post_meta->term_id=$term->id;
        $post_meta->excerpt=$request->excerpt;
        $post_meta->save();

        return response()->json(['Experience Update']);

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
      
        
        return response()->json('Experience '.$request->status);
     }
}
