@extends('layouts.app');
@section('ActiveViewCategory','active');

@section('content')
<div class="col-md-8">
<table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>#</th>
		<th>Category Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
</thead>
<tbody>
	@foreach ($categories as $category) 
	<tr>
		<th> {{ $category->id }} </th>
		<td> {{ $category->name }} </td>
		<td><a class="btn btn-success btn-xs" href="{{route('category.edit',$category->id)}}"> Edit </a> 
		</td>
		<td>
		<form method="POST" action="{{route('category.destroy',$category->id)}}"> <input type="submit" class="btn btn-danger btn-xs" onClick="javascript: return confirm('Are you sure you want to delete?');" value="Delete"> {{ csrf_field() }} {{ method_field("DELETE") }} </form> </td>

	</tr>
	@endforeach
</tbody>
</table>
</div>
@endsection
