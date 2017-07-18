@extends('layouts.app')

@section('ActiveEditOrder','active');
@section('content')

<div class="col-md-12">
	<div class="row">
		<img src="/uploads/products/{{ $order->product->image_path }}" width=70px height 70px>
		<h4> Name: {{ $order->product->name }} </h4>
		<h4> Categories: {{ $order->product->category->name }} </h4>
		<h4> Price: {{ $order->product->price }} </h4>
		<h4> Discounted Price: {{ $order->product->discountPrice }} </h4>
		<h4> Quantity: {{ $order->quantity }} </h4>
		<h4> CreatedAt: {{ $order->created_at }} </h4>
		<div class="col-sm-2">
			
		<form action="{{route('order.update',$order->id)}}" method="post">
			<div class="form-group"> <label for="order_status">Order Status</label>
				<select class="form-control" name="order_status">
					<option value="processing">Processing</option>
					<option value="delivered">Delivered</option>
				</select>
			</div>
			<input type="submit" class="btn btn-md btn-default" value="Update order">
			{{ csrf_field() }}
		</form>
		</div>

	</div>
</div>
@endsection