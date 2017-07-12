@extends('layouts.app')

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
						<input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" class="form-control" id="price" name="price" placeholder="Price">
					</div>

					<div class="form-group">
						<label for="discount">Discouted Price</label>
						<input type="text" class="form-control" id="discount" name="discount" placeholder="Discounted Price">
					</div>

					<div class="form-group">
						<label for="size">Size</label>
						<input type="text" class="form-control" id="size" name="size" placeholder="Discounted Price">
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control" id="color" name="color" placeholder="Color">
					</div>

					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">
					</div>

					<div class="form-group">
						<label for="image">Product Image</label>
						<input type="file" id="image" name="image">
						<p class="help-block">Image of the products.</p>
					</div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

