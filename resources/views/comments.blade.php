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
	
	<form action="/comments/{{$comment->id}}" method="POST">
		{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Comment</label>
    <input name="comment" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
