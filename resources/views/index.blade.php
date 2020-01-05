@extends('layout.app')

  @section('content')
		

<br>
<br>
<br>

<div class="row ">
	<a href="posts/create" class="badge badge-success mx-auto">Create Post</a>
</div>
<br>
<div class="container-fluid">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Image</th>
     <!--  <th>PostedBy</th> -->
      <th scope="col">CreatedAt</th>
      <th>Comment</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($getData as $key)
   <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->title}}</td>
      <td>{{$key->slug}}</td>

      <td> <img src="{{  asset('/images/'.$key->img) }}"></td>

      
      <td>{{$key->created_at->format('Y-M-d')}}</td>
     
      @foreach($key->comments as $comment)
      <td>{{$comment->comment}}</td>
      @endforeach
       
      <td><a class="badge badge-success text-center" style="width: 70px;height: 34px;" href="/posts/{{$key->id}}">View</a></td>
      <td><a class="badge badge-primary text-center" style="width: 70px;height: 34px;" href="/posts/{{$key->id}}/edit">Edit</a></td>
      <td>
        <form action="/posts/{{$key->id}}" method="POST">
          
  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
      </td>
      <td><a class="badge badge-success text-center" style="width: 70px;height: 34px;" href="/comments/{{$key->id}}">Comment</a></td>
    </tr>

    @endforeach
  </tbody>
</table>
{{$getData->links()}}
</div>
<body>
@endsection
