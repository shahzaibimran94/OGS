@extends('layouts.master')

@section('title')
    OGS - Cart
@endsection

@section('content')

	<div class="container">
		<center><h1 style="color:#46c266;">Shopping Cart</h1></center><br>
		@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-12">
				<table align="center" class="table text-center">
					<thead>
						<tr>
							<th></th>
							<th><center>Name</center></th>
							<th><center>Price</center></th>
							<th><center>Quantity</center></th>
							<th><center>Reduce Qty.</center></th>
							<th><center>Remove Product</center></th>
							<th><center>Total</center></th>
						</tr>
					</thead>
					<tbody>
						<?php $grandtotal = 0;?>
						@foreach($order as $o)
						<tr>
							<td style="width:10%;"><img style="width:40px;height:50px;" src="public/{{$o->product->image}}"></td>
							<td>{{ $o->product->name }}</td>
							<td>{{ $o->product->price }}</td>
							<td>{{ $o->quantity }}</td>
							<td><a style="color: inherit;" href="{{ route('item.decrement', ['id' => $o->id]) }}"><i class="fa fa-minus"></i></a></td>
							<td><a style="color: inherit;" href="{{ route('item.delete', ['id' => $o->id]) }}"><i class="fa fa-trash-o"></i></a></td>
							<td>Rs.
							<?php  
								$q = $o->quantity; $p = $o->product->price; 
								$total = $q*$p; 
								echo $total;
								$grandtotal+=$total;
								$orderid = $o->order_id; 
							?></td>
						</tr>
						@endforeach
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><br><b>Total Amount :</b></td>
							<td><br><b>Rs.<?php echo $grandtotal;?></b></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('product.index') }}" class="btn btn-default pull-left">Add New Items</a>
				<a class="btn btn-default pull-right checkout">CheckOut</a>
			</div>
		</div>
		@else
			<div>
				<br><br>
				<center>
					<h1 style="color:#46c266;">Your Cart Is Empty</h1>
					<a style="color: inherit;" href="{{ route('product.index') }}"><i class="fa fa-home fa-2x"></i> Home</a>
				</center>
				<br><br>
			</div>
		@endif
		<br><br>
		<div class="deliveryForm">
		<center><h1 style="color:#46c266;">Delivery Details</h1></center>
		<div class="row">
			<div class="col-md-12">
				<table class="table text-center table-bordered">
					<form method="POST" action="{{ route('add.order') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="orderid" value="<?php if(isset($orderid)) echo $orderid;?>"/>
					<input type="hidden" name="amount" value="<?php if(isset($grandtotal)) echo $grandtotal;?>"/>
					<tbody>
						<tr>
							<td><label>Full Name</label></td>
							<td><input type="text" name="name"/></td>
						</tr>
						<tr>
							<td><label>Phone</label></td>
							<td><input type="text" name="phone" id="phone"/></td>
						</tr>
						<tr>
							<td><label>Address</label></td>
							<td><input type="text" name="address"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="Process" class="btn btn-default"></td>
						</tr>
					</tbody>
					</form>
				</table>
			</div>
		</div>
		</div>
		<br><br>
	</div>
	
@endsection

@section('scripts')
<script>
$(document).ready(function(){
        $(".deliveryForm").css("display", "none");
        $(".checkout").click(function(){
        	$(".deliveryForm").animate({height:'toggle'}).css("display", "block");
        })
});
</script>
@endsection