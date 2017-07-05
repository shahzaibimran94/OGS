<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\OrderDetail;
use App\Order;
class OrderController extends Controller
{
    public function addOrder(Request $r) {
        $address = Address::where('name',$r->input('name'))->get()->first();
        if($address==''){
    	$order = array('name' => $r->input('name'),
    	                'phone' => $r->input('phone'),
    	                'address' => $r->input('address')
    	                );
    	Address::create($order);
        }
    	$address = Address::where('name',$r->input('name'))->get()->first();
    	$id = $address->id;
    	$data = array('order_id' => $r->input('orderid'),
    				  'address_id' => $address->id,
    				  'amount' => $r->input('amount') 
    				  );
    	$checkout = OrderDetail::create($data);
        Order::where('order_id',$r->input('orderid'))->update(array('orderPlaced' => 'Yes'));
    	if($checkout){
    		$r->session()->flush('cart');
    		$r->session()->flush('orderid');
            $message = 'Order has been Placed!';
            $r->session()->flash('message',$message);
    		return redirect()->route('product.index');
    	}else{
            $message = 'Failed to Place your Order!';
            $r->session()->flash('message',$message);
            return redirect()->route('product.index');
    	}
    } 
}
