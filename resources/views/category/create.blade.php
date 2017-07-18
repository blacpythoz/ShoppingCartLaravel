@extends ('layouts.app')

@section('ActiveCreateCategory','active');
@section('content')

<div class="col-md-6">
<h3> Add New Category  </h3>

<form method="POST" action="{{route('category.store')}}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" id="name" required placeholder="Category Name">
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-default">Add Category</button>
</form>
</div>

@endsection
