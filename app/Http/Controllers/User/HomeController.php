<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class HomeController extends Controller
{
    
public function index(){
	$posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(10);
	    return view('user.blog',compact('posts'));

}
public function tag(Tag $tag)
{
	$posts= $tag->posts();
	    return view('user.blog',compact('posts'));
}


public function cat(Category $cat)
{
	$posts=$cat->posts();
	 return view('user.blog',compact('posts'));
}

    }
