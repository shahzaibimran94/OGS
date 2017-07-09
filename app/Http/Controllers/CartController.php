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
            $order_id = $r->session()->get('orderid');
    		if($order->quantity>1) {
	    		Order::find($id)->decrement('quantity');
	    		$count = Order::where('order_id',$order_id)->sum('quantity');
	        	$r->session()->put('cart',$count);
                $order = Order::where('order_id',$order_id)->get();
                Session::put('cartDetails',$order);
	        	return redirect()->route('cart.view');
        	}else {
        		$order->delete();
                $count = Order::where('order_id',$order_id)->sum('quantity');
        		//$count = Order::sum('quantity');
	        	$r->session()->put('cart',$count);
                $order = Order::where('order_id',$order_id)->get();
                Session::put('cartDetails',$order);
        		return redirect()->route('cart.view');
        	}
    	}
    }

    public function removeItem(Request $r, $id) {

    	if($id){
    		$order = Order::find($id);
    		$order->delete();
            $order_id = $r->session()->get('orderid');
            $count = Order::where('order_id',$order_id)->sum('quantity');
        	//$count = Order::sum('quantity');
	       	$r->session()->put('cart',$count);
            $order = Order::where('order_id',$order_id)->get();
            Session::put('cartDetails',$order);
        	return redirect()->route('cart.view');
    	}
    }
}
