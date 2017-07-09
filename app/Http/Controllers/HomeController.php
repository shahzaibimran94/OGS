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
        $order = Order::where('order_id',$order_id)->get();
        if($order == '[]'){
        
        }else{
            Session::put('cartDetails',$order);
        }

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

    public function cartBox(Request $r) {
        
        $orderid = $r->session()->get('orderid');
        $order = Order::with(['product'])->where('order_id',$orderid)->get();
        $data = array();
        for ($i=0;$i<sizeof($order);$i++) {
          $data['name'] = $order[$i]->product->name;
          $data['image'] = $order[$i]->product->image;
          $data['price'] = $order[$i]->product->price;
        }
        /*$ids = array();
        foreach($order as $o){
            array_push($ids,$o->product_id);
        }
        $product = Product::whereIn('id',$ids)->get();*/
        $cartData = "<table style='border: 1px solid black;'>";
        foreach ($order as $o) {
            $cartData .= "<tbody><tr><td> Quantity </td><td> $o->quantity </td></tr></tbody>";
        }
        $cartData .= "</table>";
        echo $cartData;
        dd($order);
        /*if($order == '[]'){
            return 'null';
        }else{
            return $order;
        }*/   
    }
}
