<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
class PostController extends Controller
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
        $posts= Post::all();
            return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
         $cats = Category::all();
        $tags = Tag::all();
      return view('admin.post.create',compact('cats','tags'));
    }
 
              return redirect(route('admin.home'));

   
      
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
            'title'=>'required',
            'body'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',

        ]);
  if ($request->hasFile('image')) {
          $imageName= $request->image->store('public');
      }
        $post = new Post;
                $post->image= $imageName;

        $post->title =$request->title;
        $post->subtitle =$request->subtitle;
        $post->slug =$request->slug;
        $post->body =$request->body;
        $post->status =$request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->cats()->sync($request->cats);
        return redirect(route('post.index'));
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
                if (Auth::user()->can('posts.update')) {

        $post= Post::with('tags','cats')->where('id',$id)->first();
         $cats = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',compact('post','cats','tags'));
    }
 
              return redirect(route('admin.home'));
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
            'title'=>'required',
            'body'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
            

        ]);
      if ($request->hasFile('image')) {
          $imageName= $request->image->store('public');
      }

        $post =  Post::find($id);
        $post->image= $imageName;
        $post->title =$request->title;
        $post->subtitle =$request->subtitle;
        $post->slug =$request->slug;
        $post->body =$request->body;
         $post->status =$request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->cats()->sync($request->cats);
        return redirect(route('post.index'));
        }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Post::where('id',$id)->delete();
        return redirect()->back();  
          }
}
