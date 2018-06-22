<?php

namespace App;
use Carbon\Carbon;

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
     public function likes()
    {
        return $this->hasMany('App\Like');
    }

     public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
     public function getSlugAttribute($value)
    {
        return route('post',$value);
    }
}
