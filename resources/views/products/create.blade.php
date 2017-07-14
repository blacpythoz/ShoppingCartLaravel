@extends('layouts.app')
@section('ActiveCreateProduct','active');

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">Create Products</div>

			<div class="panel-body">
				<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" class="form-control" id="name" name="name" required placeholder="Product Name">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" class="form-control" id="price" name="price" required placeholder="Price">
					</div>
					<div class="form-group"> <label for="category_id">Categories</label>
						<select class="form-control" name="category_id">
							@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="discount">Discouted Price</label>
						<input type="text" class="form-control" id="discount" name="discount" required placeholder="Discounted Price">
					</div>

					<div class="form-group">
						<label for="size">Size</label>
						<input type="text" class="form-control" id="size" name="size" required placeholder="Discounted Price">
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control" id="color" name="color" required placeholder="Color">
					</div>

					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" class="form-control" id="weight" name="weight" required placeholder="Weight">
					</div>

					<div class="form-group">
						<label for="image">Product Image</label>
						<input type="file" id="image" required name="image">
						<p class="help-block">Image of the products.</p>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

