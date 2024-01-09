<?php 

namespace Amcoders\Plugin\Faq\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Options;
/**
 * 
 */
class FaqController extends controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       	$posts=Options::where('key','faq')->get();
        return view('plugin::faq.index',compact('posts'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plugin::faq.create');
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

        $data['title']=$request->title;
        $data['excerpt']=$request->excerpt;
        $data['faq']=$faq ?? [];
        $data['image']=$request->image;
        $data['banner']=$request->banner;

        $Options=new Options;
        $Options->key='faq';
        $Options->value=json_encode($data);
       	$Options->lang=$request->lang;
       	$Options->save();

       	return response()->json(['Faq Created']);
       

       
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
         $info=Options::find($id);  
         $data=json_decode($info->value);
          return view('plugin::faq.edit',compact('data','info'));
       
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
            'excerpt' => 'required', 
        ]);
       
         foreach ($request->question as $key => $row) {
            $faq[ $row ] = $request->answer[$key];
        }

        $data['title']=$request->title;
        $data['excerpt']=$request->excerpt;
        $data['faq']=$faq ?? [];
        $data['image']=$request->image;
        $data['banner']=$request->banner;

        $Options=Options::find($id);
       	$Options->key='faq';
        $Options->value=json_encode($data);
       	$Options->lang=$request->lang;
       	$Options->save();

       	return response()->json(['Faq Updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
      
        if ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   Options::destroy($id);
                   
                }
            }
            return response()->json('Faq Removed');
        }
      
        
       
    }
}