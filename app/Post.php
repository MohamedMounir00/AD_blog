<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\Tag','post_tags')->withTimestamps();
    }

    public function cats()
    {
    	return $this->belongsToMany('App\Category','category__posts')->withTimestamps(); 
    }
    public function getRouteKeyName(){
    	return 'slug';
    }
}
