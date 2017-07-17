@extends('layouts.app')

@section('ActiveHome','active');
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> Dashboard </h1>
	</div>
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$products->count() }}</div>
						<div>Total Products</div>
					</div>
				</div>
			</div>
			<a href="{{route('product.index')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$categories->count()}}</div>
						<div>All Category</div>
					</div>
				</div>
			</div>
			<a href="{{route('category.index')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$orders->count()}}</div>
						<div>New Orders!</div>
					</div>
				</div>
			</div>
			<a href="{{route('order.index')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$users->count()}}</div>
						<div>Users</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Orders Panel</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order #</th>
								<th>Name</th>
								<th>Quantity</th>
								<th>Order Date</th>
								<th>Order Time</th>
								<th>Amount (Rs)</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($orders as $order)	
							<tr>
								<td>{{$order->id}}</td>
								<td> {{ $order->product->name }} </td>
								<td> {{ $order->quantity }} </td>
								<td>{{$order->created_at->toFormattedDateString()}}</td>
								<td>{{$order->created_at->format('h:i A')}}</td>
								<td>{{$order->product->price}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="{{route('order.index')}}">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection