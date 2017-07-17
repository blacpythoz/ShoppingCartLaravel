@extends('layouts.app')

@section('ActiveViewOrder','active');
@section('content')

<div class="col-md-12">
	<div class="row">
	<form method="post" action="{{route('order.search')}}">
		<input type="text" name="search" placeholder="Search ">
		<input type="date" name="fromDate">
		<input type="date" name="toDate">
		<select name="category_id">
							<option value="">---</option>
							@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name }}</option>
							@endforeach
		</select>
		<input type="submit" name="submit" value="Filter Order">
		{{csrf_field()}}
		</form>
	</div>
	<div class="row">



			<div class="panel panel-default">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th> #</th>
					<th> Image </th>
					<th> Name </th>
					<th> Category </th>
					<th> Status </th>
					<th> Price </th>
					<th> D.Price </th>
					<th> Quantity </th>
					<th> Order Date </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order) 
				<tr>
					<td> {{ $order->id }} </td>
					<td> <img src="/uploads/products/{{ $order->product->image_path }}" width=70px height 70px></td>
					<td> {{ $order->product->name }} </td>
					<td> {{ $order->product->category->name }} </td>
					<td> {{ $order->status }} </td>
					<td> {{ $order->product->price }} </td>
					<td> {{ $order->product->discountPrice }} </td>
					<td> {{ $order->quantity }} </td>
					<td> {{ $order->created_at }} </td>
					<td> <a href="{{route('order.edit',$order->id)}}"> Edit </a></td>
				</tr>
				@endforeach
			</tbody>

		</table>
		</div>
		<div class="text-center">
			{!! $orders->links(); !!}
		</div>

	</div>
</div>
@endsection