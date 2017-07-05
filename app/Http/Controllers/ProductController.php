<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\Product;
use Session;
//use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function index(Request $r) {
    	if(Session::has('user')){
	    	$data = OrderDetail::get();
	    	return view('admin.dashboard',compact('data'));
    	}else{
    		return redirect()->route('index');
    	}
    }

    public function viewProd() {
    	if(Session::has('user')){
	    	$data = Product::get();
	    	return view('admin.products',compact('data'));
	    }else{
	    	return redirect()->route('index');	
	    }
    }

    public function addProd(Request $r) {
    	if(Session::has('user')){
    		if($r->input('name')){
	    		$file = $r->file('image');
	    		if($file){
	    			$extension = $file->getClientOriginalExtension();
	    			if(in_array($extension, array('jpeg','jpg','gif','tiff','bmp','png','PNG'))){
	    				
	    				Session::forget(['imageError','addProdData']);
	    				
	    				$filename = $file->getClientOriginalName();
			    		$extension = $file->getClientOriginalExtension();
			    		$destinationPath = public_path(). '\images';
			    		$newFileName = date('mdyhis').'.'.$extension;
			    		$file->move($destinationPath,$newFileName);
			    		$image = '/images/'.$newFileName;
			    		
			    		$data = array('name' => $r->input('name'),
				    				 'description' => $r->input('description'),
				    				 'price' => $r->input('price'),
				    				 'image' => $image	
				    				 );

			    		Product::create($data);
			    		return redirect()->route('prod.view');
	    			}else{
	    				$data = array('name' => $r->input('name'),
	    				 'description' => $r->input('description'),
	    				 'price' => $r->input('price')	
	    				 );
	    				$msg = 'File Recieved was not an Image.';
	    				Session::put('imageError',$msg);
	    				Session::put('addProdData',$data);
	    				return back();
	    			}	
	    		}else{
	    			return back();
	    		}
	    	}else{
	    		return view('admin.product.add');
	    	}
	    }else{
	    	return redirect()->route('index');
	    }
    }

    public function editProd(Request $r, $id){

    	$prodData = Product::find($id);
    	$data = Product::get();
    	return view('admin.products',compact('data','prodData'));	
	}
   

    public function update(Request $r){

    	$file = $r->file('image');
    	if($file){
			$extension = $file->getClientOriginalExtension();
			$destinationPath = public_path(). '\images';
			$newFileName = date('mdyhis').'.'.$extension;
			$file->move($destinationPath,$newFileName);
			$image = '/images/'.$newFileName;

	    	$data = array('name' => $r->input('name'),
						 'description' => $r->input('description'),
						 'price' => $r->input('price'),
						 'image' => $image	
		    			 );
	    	Product::find($r->input('id'))->update($data);
	    	Session::flash('prodUpdated','Product Updated Successfully!');
	    	return redirect()->route('prod.view');
    	}else{
    		$data = array('name' => $r->input('name'),
						 'description' => $r->input('description'),
						 'price' => $r->input('price'),	
		    			 );
	    	Product::find($r->input('id'))->update($data);
	    	Session::flash('prodUpdated','Product Updated Successfully!');
	    	return redirect()->route('prod.view');
    	}
    }
}
