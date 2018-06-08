<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CatController extends Controller
{

     public function __construct()
    {
      $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
    return view('admin.cat.show',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',

        ]);

        $cat = new Category;
        $cat->name =$request->name;
        $cat->slug =$request->slug;
        $cat->save();
        return redirect(route('cat.index')); 
           }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                  $cat= Category::where('id',$id)->first();
            return view('admin.cat.edit',compact('cat'));   
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
              $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',

        ]);

        $cat = Category::find($id);
        $cat->name =$request->name;
        $cat->slug =$request->slug;
        $cat->save();
        return redirect(route('cat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::where('id',$id)->delete();
        return redirect()->back();
            }
}
