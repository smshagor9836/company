<?php

namespace Amcoders\Plugin\services\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\PostCategory;
use App\Terms;
use App\Meta;
use App\Post;
use Illuminate\Support\Str;
use Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->src) {
           $posts=Terms::with('user')->where('type',4)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::with('user')->where('type',4)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('plugin::admin.services.service.index',compact('posts','status'));
            }
            else{
               $posts=Terms::with('user')->where('type',4)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('plugin::admin.services.service.index',compact('posts','status')); 
           }
           
       }
        else{
          $posts=Terms::with('user','productMeta')->where('type',4)->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;
        return view('plugin::admin.services.service.index',compact('posts','status'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plugin::admin.services.service.create');
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
            'excerpt' => 'required', 
        ]);
       
         foreach ($request->question as $key => $row) {
            $faq[ $row ] = $request->answer[$key];
        }
       

        $creat_slug=Str::slug($request->title);
        $check=Terms::where('slug',$creat_slug)->count();
         if ($creat_slug=='') {
            
            $creat_slug=str_replace(' ', '-', $request->title);

        }
        if ($check != 0) {
            $slug=$creat_slug.'-'.$check;
        }
        else{
            $slug=$creat_slug;
        }

        $post=new Terms;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->type=4;
        $post->auth_id=Auth::id();
        $post->status=$request->status;
        $post->lang=$request->lang;
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
        $json['faq']=$faq ?? [];
        $postdetail->content=json_encode($json);
        $postdetail->save();

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
         $info=Terms::with('meta','post','categories')->find($id);  
         $json=json_decode($info->post->content);
          return view('plugin::admin.services.service.edit',compact('info','json'));
       
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
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|max:100',            
        ]);

        $checktitle= Category::where('name',$request->name)->where('type',$request->name)->where('id','!=',$id)->first();
        $checkslug= Category::where('slug',$request->slug)->where('type',$request->slug)->where('id','!=',$id)->first();
        if (!empty($checkslug)) {
            return response()->json(['Slug Must Be unique'],401);
        }

        if (!empty($checktitle)) {
            return response()->json(['Title Name Must Be unique'],401);
        }        
        
        
         foreach ($request->question ?? [] as $key => $row) {
            $faq[ $row ] = $request->answer[$key];
        }
        $post= Terms::find($id);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->type=4;
        $post->auth_id=Auth::id();
        $post->lang=$request->lang;
        $post->status=$request->status;
        $post->save();

        $post_meta =  Meta::where('term_id',$id)->first();
        $post_meta->term_id=$post->id;
        $post_meta->preview=$request->preview;
        $post_meta->gallery=$request->gallery;
        $post_meta->excerpt=$request->excerpt;
        $post_meta->save();


         if ($request->category) {
             PostCategory::where('term_id',$id)->delete(); 
         foreach ($request->category as $cat_row) {
           
                $cat= new PostCategory;
                $cat->term_id=$post->id;
                $cat->category_id=$cat_row;
                $cat->save();
          

         }
        }

        
        $postdetail= Post::where('term_id',$id)->first();
        $postdetail->term_id=$post->id;
        $postdetail->post_type=$request->post_type;
        $json['content']=$request->content;
        $json['faq']=$faq ?? [];
        $postdetail->content=json_encode($json);
        $postdetail->save();
        



        return response()->json('Service Updated');
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
      
        
        return response()->json('Service Removed');
    }
}
