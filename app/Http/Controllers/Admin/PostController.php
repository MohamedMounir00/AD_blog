<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
class PostController extends Controller
{
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
        $cats = Category::all();
        $tags = Tag::all();
            return view('admin.post.create',compact('cats','tags'));
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

        ]);

        $post = new Post;
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
        
        $post= Post::with('tags','cats')->where('id',$id)->first();
         $cats = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',compact('post','cats','tags'));

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

        ]);

        $post =  Post::find($id);
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
