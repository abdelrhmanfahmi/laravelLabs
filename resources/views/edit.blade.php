

	@extends('layout.app');

	@section('content');
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form action="/posts/{{$getEditById->id}}" method="POST">
		{{csrf_field()}}
		    {{ method_field('PUT') }}

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" value="{{$getEditById->title}}"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="description" value="{{$getEditById->description}}"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
