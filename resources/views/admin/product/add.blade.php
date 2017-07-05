@extends('layouts.admin')

@section('title')
    OGS - Product
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<br><br>
			<center>
				<h1><i class="fa fa-plus-circle"></i>&nbspProduct</h1>
			</center>
			<center>
			<div style="width: 60%;background-color: white;padding: 2%;margin-top: 3%;">
				<form method="POST" action="{{ route('prod.add') }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
					<br>
					<h3>Add New Product in Store</h3>
					<br>
					<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text" autofocus="" required value="{{ Session::has('addProdData') ? Session::get('addProdData')['name'] : '' }}">
							</div>
							<div class="form-group">
								<textarea style="resize: none;" class="form-control" placeholder="Description" name="description" required="">{{ Session::has('addProdData') ? Session::get('addProdData')['description'] : '' }}</textarea>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Price" type="text" name="price" required="" value="{{ Session::has('addProdData') ? Session::get('addProdData')['price'] : '' }}">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Image" type="file" name="image" required="">
								{{ Session::has('imageError') ? 'Image Error : '.Session::get('imageError') : '' }}
							</div>
							<input type="submit" name="add" value="ADD" class="btn btn-primary">
					</fieldset>
				</form>
			</div>	
			</center>
		</div>
	</div>

@endsection