<?php

namespace App\Http\Controllers;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index (Request $r) {

        $products = Product::get();
        return view('shop.welcome',compact('products'));
    }

    public function getAddToCart(Request $request , $id) {
        if(Session::has('cart')) {
            $orderid = $request->session()->get('orderid');
            $orders = Order::where('product_id',$id)->where('order_id',$orderid)->get()->first();
            if($orders){
                Order::find($orders->id)->increment('quantity');
            }else {
                $product = Product::find($id); 
                $data = array('order_id' => $orderid, 
                              'product_id' => $product->id );
                Order::create($data);
            }
        }else{
            $product = Product::find($id); 
                $orderid = date('mdyhi');
                $request->session()->put('orderid',$orderid);
                $data = array('order_id' => $orderid, 
                              'product_id' => $product->id 
                              );
            Order::create($data);
        }
        $order_id = $request->session()->get('orderid');
        $count = Order::where('order_id',$order_id)->sum('quantity');
        $request->session()->put('cart',$count);

        return redirect()->route('product.index');
    }

    public function cartView(Request $r) {

        $orderid = $r->session()->get('orderid');
        $order = Order::where('order_id',$orderid)->get();
        if($order == '[]'){
            $r->session()->flush('cart');
            return view('cart-view');
        }else{
            return view('cart-view',compact('order'));
        }
    }
}
