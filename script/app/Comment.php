<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table="comments";
	public function term()
	{
		return $this->belongsTo('App\Terms');
	}

	public function reply()
	{
		return $this->hasMany('App\Comment','p_id','id');
	}
}
