<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public  function post(Post $post){

    	    return view('user.post',compact('post'));

    }

    public function getAllposts()
    {
    	return 	$posts = Post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(10);

    }

    public function savelike(Request $request){
    	    	$likecheck = Like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
    	    	if($likecheck)
    	    	{
    	    		Like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
    		return 'deleted';
    	}else{

    	$like = new Like;
	    	$like->user_id = Auth::id();
	    	$like->post_id = $request->id;
	    	$like->save();
	    }
    }


}
