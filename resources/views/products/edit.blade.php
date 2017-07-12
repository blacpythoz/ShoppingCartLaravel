@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Products</div>

			<div class="panel-body">
				<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{$product->name }}">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{$product->price }}">
					</div>

					<div class="form-group">
						<label for="discount">Discouted Price</label>
						<input type="text" class="form-control" id="discount" name="discount" placeholder="Discounted Price" value="{{$product->discountPrice}}">
					</div>

					<div class="form-group">
						<label for="size">Size</label>
						<input type="text" class="form-control" id="size" name="size" value="{{$product->feature->size}}">
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control" id="color" name="color" value="{{$product->feature->color}}">
					</div>

					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" class="form-control" id="weight" name="weight" value="{{$product->feature->weight}}">
					</div>

					<div class="form-group">
						<label for="image">Product Image</label><br>
						<img src="/uploads/products/{{$product->image_path}}" height=50px width=50px><br><br>
						<input type="file" id="image" name="image">
						<p class="help-block">Upload new image</p>
					</div>
				  <button type="submit" class="btn btn-default">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

