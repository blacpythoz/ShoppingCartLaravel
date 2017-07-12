@extends('layouts.app')

@section('content')

<div class="col-md-12">
	<div class="row">
	<form method="post" action="{{route('product.search')}}">
		<input type="text" name="search" placeholder="Search ">
		<input type="date" name="fromDate">
		<input type="date" name="toDate">
		<input type="text" name="fromPrice" placeholder="From Price">
		<input type="text" name="toPrice" placeholder="To Price">
		<input type="submit" name="submit" value="Filter Product">
		{{csrf_field()}}
		</form>
	</div>
	<div class="row">


		<table class="table">
			<thead>
				<tr>
					<th> #</th>
					<th> Image </th>
					<th> Name </th>
					<th> Price </th>
					<th> D.Price </th>
					<th> Size </th>
					<th> Weight </th>
					<th> Color </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product) 
				<tr>
					<td> {{ $product->id }} </td>
					<td> <img src="/uploads/products/{{ $product->image_path }}" width=70px height 70px></td>
					<td> {{ $product->name }} </td>
					<td> {{ $product->price }} </td>
					<td> {{ $product->discountPrice }} </td>
					<td> {{ $product->feature->size }} </td>
					<td> {{ $product->feature->weight }} </td>
					<td> {{ $product->feature->color }} </td>
					<td> <a href="{{route('product.edit',$product->id)}}"> Edit </a></td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
@endsection