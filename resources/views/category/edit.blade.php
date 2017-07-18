@extends('layouts.app')

@section('ActiveEditCategory','active');

@section('content')

<div class="col-md-6">
<h3> Edit Category  </h3>

<form method="POST" action="{{route('category.update',$category->id) }}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" id="name" required value="{{$category->name}}" >
  </div>
  {{ csrf_field() }}
  {{ method_field("PUT")}}
  <button type="submit" class="btn btn-default">Update Category</button>
</form>
</div>

@endsection
