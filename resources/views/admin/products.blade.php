@extends('layouts.admin')

@section('title')
    OGS - Products
@endsection

@section('content')
	@if(Session::has('prodUpdated'))
	<center>
	<div class="bg-success" style="width:50%;">
		<h1>{{Session::get('prodUpdated')}}</h1>
	</div>
	</center>
	@endif
	<div class="row">
		<div class="col-md-12">
			<br><br>
			<center><h1>Products</h1></center>
			<div class="table-responsive">
				<table class="table" style="overflow-x:auto;">
					<thead>
						<th>#</th>
						<th></th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Action</th>
					</thead>
					<tbody>
					@foreach($data as $key => $d)
						<tr>
							<td>{{ $key+1 }}</td>
							<td><img style="width:50px;height:50px;" src='{{URL::asset("public$d->image")}}'></td>
							<td>{{ $d->name }}</td>
							<td>{{ $d->description }}</td>
							<td>{{ $d->price }}</td>
							<td><a href="{{ url('update',$d->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp-&nbsp<a href="#"><i class="fa fa-trash-o"></i></a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	@if(isset($prodData))
	<h1>Update Product</h1>
		<center>
			<div style="width: 60%;background-color: white;padding: 2%;margin-top: 3%;">
				<form method="POST" action="{{ route('prod.update') }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
					<input type="hidden" name="id" value="{{$prodData->id}}">
					<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text" autofocus="" required value="{{ Session::has('addProdData') ? Session::get('addProdData')['name'] : '' }}{{$prodData->name}}">
							</div>
							<div class="form-group">
								<textarea style="resize: none;" class="form-control" placeholder="Description" name="description" required="">{{ Session::has('addProdData') ? Session::get('addProdData')['description'] : '' }}{{$prodData->description}}</textarea>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Price" type="text" name="price" required="" value="{{ Session::has('addProdData') ? Session::get('addProdData')['price'] : '' }}{{$prodData->price}}">
							</div>
							<div class="form-group">
								@if(isset($prodData->image))
								<img class="pull-left" style="width:50px;height:50px;" src='{{URL::asset("public$prodData->image")}}'>
								<input class="form-control" placeholder="Image" type="file" name="image">
								@else
								<input class="form-control" placeholder="Image" type="file" name="image" required="">
								@endif
								{{ Session::has('imageError') ? 'Image Error : '.Session::get('imageError') : '' }}
							</div>
							<input type="submit" name="add" value="Update" class="btn btn-primary">
					</fieldset>
				</form>
			</div>	
		</center>
	@endif
@stop