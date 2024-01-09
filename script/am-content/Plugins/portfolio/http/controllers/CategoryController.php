<?php

namespace Amcoders\Plugin\portfolio\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!empty($request->query)) {
            $req=$request->qry;    
        }
        else{
            $req='';
        }
        return  view('plugin::portfolio.category.index',compact('req'));
        


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
            'name' => 'required|max:100', 
        ]);

        

        if ($request->p_id) {
            $pid=$request->p_id;
        }
        else{
            $pid=null;
        }
        $category=new Category;
        $category->name=$request->name;
        $category->slug="#";
        $category->p_id=$pid;
        $category->type=8;
        $category->user_id=Auth::id();
        $category->save();
        return response()->json('category created');

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
        $info=Category::find($id);
        return view('plugin::portfolio.category.edit',compact('info'));
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
            'name' => 'required|max:100',
              
        ]);

             
        if ($request->p_id==null) {
           $p_id=null;
        }
        else{
             $p_id=$request->p_id;
        }
        $category=Category::find($id);
        $category->name=$request->name;
        $category->p_id=$p_id;
        $category->save();
        return response()->json('Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        if ($request->method=='delete') {
             if ($request->ids) {
                foreach ($request->ids as $id) {
                    Category::destroy($id);
                }
             }
        }
       
        
        return response()->json('Category Removed');
    }
}
