<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table="orders";

	public function orderlist()
	{
		return $this->belongsToMany('App\Terms','order_items','order_id','term_id');    
	}
	public function ordermeta()
	{
		return $this->hasMany('App\Orderitem','order_id');    
	}

}
