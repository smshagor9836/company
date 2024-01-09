<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Terms;
use App\Meta;
use App\Post;
use Auth;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->src) {
           $pages=Terms::where('type',1)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->Terms=='trash') {
                 $pages=Terms::where('type',1)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('admin.page.index',compact('pages','status'));
            }
            else{
               $pages=Terms::where('type',1)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('admin.page.index',compact('pages','status')); 
           }
           
       }
        else{
        $pages=Terms::where('type',1)->latest()->where('status','!=',0)->paginate(20);
        }
       
        return view('admin.page.index',compact('pages'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
        $check=Terms::where('type',1)->where('slug',$creat_slug)->count();
        if ($check != 0) {
            $slug=$creat_slug.'-'.$check;
        }
        else{
            $slug=$creat_slug;
        }

        


        $post=new Terms;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->type=1;
        $post->auth_id=Auth::id();
        $post->tags=$request->tag;
        $post->status=$request->status;
        $post->lang=$request->lang;
        $post->save();

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->preview=$request->preview;
        $post_meta->gallery=$request->gallery;
        $post_meta->excerpt=$request->excerpt;
        $post_meta->save();


        $postdetail=new Post;
        $postdetail->term_id=$post->id;
       
        $postdetail->content=$request->content;
        $postdetail->save();
       
        return response()->json(['Page Created']);
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
       $info=Terms::with('meta','post')->find($id);   

       return view('admin.page.edit',compact('info'));
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
            'title' => 'required|max:255',
            'slug' => 'required|max:255',            
        ]);

        $checktitle= Terms::where('type',1)->where('title',$request->name)->where('id','!=',$id)->first();
        $checkslug= Terms::where('type',1)->where('slug',$request->slug)->where('id','!=',$id)->first();
        if (!empty($checkslug)) {
            return response()->json(['Slug Must Be unique'],401);
        }

        if (!empty($checktitle)) {
            return response()->json(['Page Title Must Be unique'],401);
        }    
        
        $post= Terms::find($id);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->type=1;
        $post->auth_id=Auth::id();
        $post->tags=$request->tag;
        $post->status=$request->status;
        $post->save();

        $post_meta =  Meta::where('term_id',$id)->first();
        if (!empty($post_meta)) {
          $post_meta->term_id=$id;
         
          $post_meta->excerpt=$request->excerpt;
          $post_meta->save();
      }
       
        $postdetail= Post::where('term_id',$id)->first();
        if (!empty($postdetail)) {
            $postdetail->term_id=$id;
          
            $postdetail->content=$request->content;
            $postdetail->save();
        }
        

       

        return response()->json(['Page updated']);
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
