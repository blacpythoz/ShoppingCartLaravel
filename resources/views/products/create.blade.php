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
							<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Product Name">
							@if ($errors->has('name'))
								<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" required placeholder="Price">
							@if($errors->has('price'))
								<span class="help-block">
									<strong>{{$errors->first('price')}}</strong>
								</span>
							@endif
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
							<input type="text" class="form-control" id="discount" value="{{old('discountPrice')}}" name="discountPrice" required placeholder="Discounted Price">
							@if($errors->has('discount'))
								<span class="help-block">
									<strong>{{$errors->first('discount')}}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label for="size">Size</label>
							<input type="text" class="form-control" id="size" name="size" value="{{old('size')}}" required placeholder="Discounted Price">
							@if($errors->has('size'))
								<span class="help-block">
									<strong> {{ $errors->first('size') }}</strong>
								</span>
								@endif
							</div>

						<div class="form-group">
							<label for="color">Color</label>
							<input type="color" name="color" value="{{old('color')}}">

						@if($errors->has('color'))
								<span class="help-block">
									<strong> {{ $errors->first('color') }}</strong>
								</span>
								@endif
						</div>

						<div class="form-group">
							<label for="weight">Weight</label>
							<input type="text" class="form-control" id="weight" value="{{old('weight')}}" name="weight" required placeholder="Weight">
							@if($errors->has('weight'))
								<span class="help-block">
									<strong> {{ $errors->first('weight') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label for="information">Brand</label>
							<input type="text" class="form-control" id="brand" value="{{old('brand')}}" name="brand" required placeholder="Brand of the product">
							@if($errors->has('brand'))
								<span class="help-block">
									<strong> {{ $errors->first('brand') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label for="information">Short Information</label>
							<input type="text" class="form-control" id="information" value="{{old('information')}}" name="information" required placeholder="Short Details of the product">
							@if($errors->has('information'))
								<span class="help-block">
									<strong> {{ $errors->first('information') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label for="weight">Description</label>
							<textarea id="summernote" name="description"><p>{{old('description')}}</p></textarea>
							@if($errors->has('description'))
								<span class="help-block">
									<strong> {{ $errors->first('description') }}</strong>
								</span>
							@endif
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

