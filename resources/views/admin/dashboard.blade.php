@extends('layouts.admin')

@section('title')
    OGS - Dashboard
@endsection

@section('content')
			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<center><a href="{{ route('order.view') }}" class="btn btn-primary">View All Orders</a><a href="{{ route('home') }}">&nbsp&nbsp&nbsp<i class="fa fa-times"></i></a></center>
			</div>
		</div>
		@if(isset($data))
		<div class="row">
			<div class="col-md-12">
				<center><h1 style="background: white;margin-bottom: 0px;">Orders</h1></center>
				<div class="table-responsive">
				<table class="table" style="overflow-x:auto;">
					<thead>
						<th>OrderID</th>
						<th>Name</th>
						<th>Address</th>
						<th>Amount</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
					@foreach($data as $d)
						<tr>
							<td>#{{ $d->order_id }}</td>
							<td>{{ $d->address->name }}</td>
							<td>{{ $d->address->address }}</td>
							<td>{{ $d->amount }}</td>
							<td>InProcess</td>
							<td><center><a href=""><i class="fa fa-trash-o"></i></a></center></td>
						</tr>
					@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>
		@endif

@endsection

@section('scripts')
<script type="text/javascript">
	function markNotificationAsRead(){
		$.get('/ogs/read');
	}
</script>
@endsection