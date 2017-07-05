<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Session;

class CartController extends Controller
{
    public function itemDecrement(Request $r, $id) {
    	
    	if($id) {
    		$order = Order::find($id);
    		if($order->quantity>1) {
	    		Order::find($id)->decrement('quantity');
	    		$count = Order::sum('quantity');
	        	$r->session()->put('cart',$count);
	        	return redirect()->route('cart.view');
        	}else {
        		$order->delete();
        		$count = Order::sum('quantity');
	        	$r->session()->put('cart',$count);
        		return redirect()->route('cart.view');
        	}
    	}
    }

    public function removeItem(Request $r, $id) {

    	if($id){
    		$order = Order::find($id);
    		$order->delete();
        	$count = Order::sum('quantity');
	       	$r->session()->put('cart',$count);
        	return redirect()->route('cart.view');
    	}
    }
}
