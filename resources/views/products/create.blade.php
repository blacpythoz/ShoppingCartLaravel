@extends('layouts.app')
@section('ActiveCreateProduct','active')

@section('style')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endsection


@section('script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script src="https://rawgit.com/fyneworks/multifile/2.1.0-preview/jquery.MultiFile.js" type="text/javascript" language="javascript"></script>


<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			  height: 300,                 // set editor height
			});
	});
</script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Create Products</div>

			<div class="panel-body">
				<div class="col-md-8">
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
							<label for="weight">Description</label>
							<textarea id="summernote" name="description"><p>Add Product Description</p></textarea>
						</div>

						<div class="form-group">
							<label for="image">Add Featured Image</label>
							<input type="file" id="featureImage" multiple name="featureImage">
							<p class="help-block">Its optional to add feature Image.</p>
						</div>


						<div class="form-group">
							<label for="image">Product Image</label>
							<input type="file" id="image" class="multi with-preview" multiple name="images[]">
							<p class="help-block">Image of the products.</p>
						</div>


						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

