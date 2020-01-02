

	@extends('layout.app');

	@section('content');
	<form action="/posts/{{$getEditById->id}}" method="POST">
		{{csrf_field()}}
		    {{ method_field('PUT') }}

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="titleUpdated" value="{{$getEditById->title}}"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="descriptionUpdated" value="{{$getEditById->description}}"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
