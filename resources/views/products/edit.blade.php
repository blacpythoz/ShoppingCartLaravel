@extends('layouts.app')
@section('ActiveEditProduct','active');
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
		 // this is your selector
  $('input.fileHolder').MultiFile({
    // your options go here
    max: 2,
    accept: 'jpg|png|gif',
  });

	});
</script>
@endsection
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
						<input type="text" class="form-control" id="name" required name="name" placeholder="Product Name" value="{{old('name')?old('name'):$product->name }}">
						@if ($errors->has('name'))
							<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
						@endif
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" class="form-control" id="price" required name="price" placeholder="Price" value="{{old('price')?old('price'):$product->price }}">
						@if($errors->has('price'))
							<span class="help-block">
									<strong>{{$errors->first('price')}}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="stock">In Stock</label>
						<input type="text" class="form-control" id="stock" name="stock" value="{{old('stock')?old('stock'):$product->stock }}" required placeholder="In Stock">
						@if($errors->has('stock'))
							<span class="help-block">
									<strong>{{$errors->first('stock')}}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="discountPrice">Discouted Price</label>
						<input type="text" class="form-control" id="discountPrice" required name="discountPrice" placeholder="Discounted Price" value="{{old('discountPrice')?old('discountPrice'):$product->discountPrice}}">
						@if($errors->has('discountPrice'))
							<span class="help-block">
									<strong>{{$errors->first('discountPrice')}}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="category_id">Categories</label>
						<select class="form-control" name="category_id">
							@foreach ($categories as $category)
							<option value="{{$category->id}}" {{$category->id == (isset($product->category->id)?$product->category->id:" ")?"selected":""}}>{{$category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="size">Size</label>
						<input type="text" class="form-control" id="size" required name="size" value="{{old('size')?old('size'):$product->feature->size}}">
						@if($errors->has('size'))
							<span class="help-block">
									<strong> {{ $errors->first('size') }}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="color">Color</label>
						<input type="color" name="color" value="{{old('color')?old('color'):$product->color}}">
						@if($errors->has('color'))
							<span class="help-block">
									<strong> {{ $errors->first('color') }}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" class="form-control" id="weight" required name="weight" value="{{old('weight')?old('weight'):$product->feature->weight}}">
						@if($errors->has('weight'))
							<span class="help-block">
									<strong> {{ $errors->first('weight') }}</strong>
								</span>
						@endif
					</div>

					<div class="form-group">
						<label for="information">Brand</label>
						<input type="text" class="form-control" id="brand" value="{{old('brand')?old('brand'):$product->brand}}" name="brand" required placeholder="Brand of the product">
						@if($errors->has('brand'))
							<span class="help-block">
									<strong> {{ $errors->first('brand') }}</strong>
								</span>
						@endif
					</div>
					<div class="form-group">
						<label for="information">Short Information</label>
						<input type="text" class="form-control" id="information" value="{{old('information')?old('information'):$product->information}}" name="information" required placeholder="Short Details of the product">
						@if($errors->has('information'))
							<span class="help-block">
									<strong> {{ $errors->first('information') }}</strong>
								</span>
						@endif
					</div>

					<div class="form-group">
						<label for="weight">Description</label>
						<textarea id="summernote" name="description">{{old('description')?old('description'):$product->description}}</textarea>
						@if($errors->has('description'))
							<span class="help-block">
									<strong> {{ $errors->first('description') }}</strong>
								</span>
						@endif
						</div>
					<div class="form-group">
						<label for="image">Product Image</label>
						<input type="file" id="image" class="fileHolder with-preview" multiple name="images[]">
						<p class="help-block">Image of the products.</p>
					</div>
					<button type="submit" class="btn btn-default">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection