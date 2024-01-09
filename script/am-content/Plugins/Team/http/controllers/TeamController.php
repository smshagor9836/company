<?php 

namespace Amcoders\Plugin\Team\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Meta;
use Illuminate\Support\Str;
use Auth;
class TeamController extends controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->src) {
           $posts=Terms::with('user')->where('type',6)->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::with('user')->where('type',6)->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('plugin::team.index',compact('posts','status'));
            }
            else{
               $posts=Terms::with('user')->where('type',6)->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('plugin::team.index',compact('posts','status')); 
           }
           
       }
        else{
          $posts=Terms::with('user')->where('type',6)->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;
        return view('plugin::team.index',compact('posts','status'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plugin::team.create');
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
            'title' => 'required|max:20', 
            
        ]);
       
       	foreach ($request->icon as $key => $row) {
            $social[ $row ] = $request->link[$key];
        }
       

        $slug=Str::slug($request->title);
       

        $post=new Terms;
        $post->title=$request->title;
        $post->slug=$request->position;
        $post->type=6;
        $post->auth_id=Auth::id();
        $post->status=$request->status;
        $post->save();

       

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->preview=$request->preview;
        $post_meta->excerpt=json_encode($social);
        $post_meta->save();

        

        return response()->json(['Teammember Created']);

       
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
         $json = json_decode($info->meta->excerpt);
         
         return view('plugin::team.edit',compact('info','json'));
       
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
            'title' => 'required|max:20', 
            
        ]);


        foreach ($request->icon as $key => $row) {
            $social[ $row ] = $request->link[$key];
        }
       

        $slug=Str::slug($request->title);
       

        $post= Terms::find($id);
        $post->title=$request->title;
        $post->slug=$request->position;
        $post->type=6;
        $post->auth_id=Auth::id();
        $post->status=$request->status;
        $post->save();

       

        $post_meta =  Meta::where('term_id',$id)->first();
        $post_meta->term_id=$post->id;
        $post_meta->preview=$request->preview;
        $post_meta->excerpt=json_encode($social);
        $post_meta->save();

        
       
       
      

        return response()->json('Team Updated');
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