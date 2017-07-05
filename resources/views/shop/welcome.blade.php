@extends('layouts.master')

@section('title')
    OGS - Your Online Kitchen
@endsection

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><img class="logo" src="public/images/Logo.png"></center>
			</div>
		</div>
		<div class="row message">
			<div class="col-md-12">
				<center>
					<h1>{{Session::has('message') ? Session::get('message') : '' }}</h1>
				</center>
			</div>
		</div>
	</div>
	
	<div class="container productContainer">
		<br>
		<center>
		<div class="row">
			<div class="col-md-12 products">
				<h1>Products
					<a style="color: inherit;" href="{{ route('cart.view') }}">
					<div style="float: right; cursor: pointer;">
        			<span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge">{{ Session::has('cart') ? Session::get('cart') : '0' }}</span></span>
      				</div>
      				</a>
      			</h1>
			</div>
		</div>
		</center>
		<br>
		<br>

		<div class="row">
			@foreach($products as $product)
		    <div class="col-md-3 text-center" style="margin-top: 1%;">
		      <img src="public{{$product->image}}" width="150px" height="150px">
		      <br>
		      {{ $product->name }} - <strong>Rs.{{ $product->price }}</strong>
		      <br>
		      <a class="btn btn-danger my-cart-btn" href=" {{ route('product.addtocart' , ['id' => $product->id]) }}">Add to Cart</a>
		      <br>
		    </div>
		    @endforeach
  		</div>

  		<center><hr class="line1"/></center>
		<br><br>
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(window).on('load',function(){
      //  $(".logo").fadeIn("slow");
	});
</script>
@endsection