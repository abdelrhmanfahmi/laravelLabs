@extends('layout.app')

	@section('content')

	<form action="/posts" method="POST">
		{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection



