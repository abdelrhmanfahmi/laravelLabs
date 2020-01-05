@extends('layout.app')

	@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form action="/posts" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Upload_Files</label>
    <input name="avatar" type="file" class="form-control" id="avatar" aria-describedby="emailHelp">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection



