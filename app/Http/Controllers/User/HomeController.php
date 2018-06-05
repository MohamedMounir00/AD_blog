<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    
public function index(){
	$posts = Post::where('status',1)->paginate(10);
	    return view('user.blog',compact('posts'));

}

    }
