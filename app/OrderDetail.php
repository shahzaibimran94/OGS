<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id','address_id','amount'];

    public function address() {
    	return $this->belongsTo('App\Address');
    }
}
