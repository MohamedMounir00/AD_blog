<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Post','category__posts')->orderBy('created_at','DESC')->paginate(10);
; 
    }
      public function getRouteKeyName(){
    	return 'slug';
    }
}
