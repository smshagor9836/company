<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table="post_category";

    public function portfolio()
    {
    	return $this->hasOne('App\Terms','id','term_id')->with('meta');
    }

    public function category()
    {
    	return $this->hasOne('App\Category','id','category_id');
    }
}
