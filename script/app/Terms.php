<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
	protected $table="terms";

	public function meta()
	{
		return 	$this->hasOne('App\Meta','term_id','id');
	}

	
	public function categories()
    {
        return $this->belongsToMany('App\Category','post_category','term_id','category_id');
    }

	public function post()
	{
		return 	$this->hasOne('App\Post','term_id','id');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment','term_id','id');
	}

	public function user()
	{
		return $this->belongsTo('App\User','auth_id','id');
	}


	public function productMeta()
	{
		return $this->hasOne('App\Productmeta','term_id','id');
	}


	public function portfolioCategory()
	{
		return $this->hasMany('App\PostCategory','term_id','id')->with('category');
	}

}
