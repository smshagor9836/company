<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table="categories";
	
	public function posts()
	{
       return $this->belongsToMany('App\Terms','post_category','category_id','term_id');
	}

	

	public function categories()
	{
		return $this->hasMany(Category::class,'p_id','id');
	}

	public function childrenCategories()
	{
		return $this->hasMany(Category::class,'p_id','id')->with('categories');
	}


	public function portfolio()
	{
		return $this->hasMany('App\PostCategory')->with('portfolio');
	}
}
