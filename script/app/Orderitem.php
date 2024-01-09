<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $table="order_items";

    public function product()
    {
    	return $this->belongsTo('App\Terms','term_id');
    }
}
