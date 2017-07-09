<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Notifiable;
	
	protected $fillable = ['name','description','price','image','status',];

	public function order() {
		return $this->hasMany('App\Order');
	}
}
