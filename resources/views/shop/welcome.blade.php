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
					<a style="color: inherit;">
					<div style="float: right; cursor: pointer;" id="cart">
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
			<div class="cart-box" style="z-index:2;min-width:30%;min-height:23%;border:solid black;margin:-3%;margin-right:0;position:absolute;right:8%;background-color: white;border-radius: 2%;">
				<i class="fa fa-times pull-right"></i>
				@if(Session::has('cart'))
					@if(Session::has('cartDetails'))
						<table class="table">
								<thead>
									<th></th>
									<th>Name</th>
									<th>Quantity</th>
									<th>Price</th>
								</thead>
								<tbody>
							
						@foreach(Session::get('cartDetails') as $o)
									<tr>
										<td><img src="public{{$o->product->image}}" width="50px" height="50px"></td>
										<td>{{ $o->product->name }}</td>
										<td>{{ $o->quantity }}</td>
										<td>{{ $o->product->price }}</td>
									</tr>
								
						@endforeach
						</tbody>
							</table>
						<center><a href="{{ route('cart.view') }}" class="btn btn-success">Checkout</a></center>
					@endif
				@else
					<center><h3 style="margin-top:27%;">Your Cart is Empty</h3></center>
				@endif
			</div>
			@foreach($products as $product)
		    <div class="col-md-3 text-center" style="margin-top: 1%;z-index:1;">
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
<script type="text/javascript">
	$(document).ready(function(){
        $(".cart-box").css("display", "none");
        //$(".checkout").click(function(){
        //	
        //})
	});
	$( "#cart" ).on( "click", function() {
  		$(".cart-box").animate({height:'toggle'}).css("display", "block");
	});
	$('.fa-times').on("click", function(){
		$(".cart-box").css("display", "none");
	});
</script>
<script type="text/javascript">
	$( "#cart" ).on( "click", function() {
  		$.ajax({
        url: 'cart-box',
        type: "GET",
        dataType: "html",
        success: function(data){
            //$data = $(data); // the HTML content that controller has produced
            //$('#item-container').hide().html($data).fadeIn();
             //$(".cart-box").html(JSON.stringify(data));
             //$order = JSON.stringify(data);
             //$(".cart-box").html($order);
             console.log(data);
             /*if(data == 'null') {
             }else{
             	$('.emptyCart').hide();
             	$(".cart-box").append($order);
             }
             document.cookie = ("data",$order);*/
        }
    	});
	});
</script>
@endsection