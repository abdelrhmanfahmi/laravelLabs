@extends('layout.app');

  @section('content');
		
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#">ITI Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">All Posts <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
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
      <th scope="col">CreatedAt</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($getData as $key)
   <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->title}}</td>
      <td>{{$key->created_at->format('Y-M-d')}}</td>
      <td><a class="badge badge-success text-center" style="width: 70px;height: 34px;" href="/posts/{{$key->id}}">View</a></td>
      <td><a class="badge badge-primary text-center" style="width: 70px;height: 34px;" href="/posts/{{$key->id}}/edit">Edit</a></td>
      <td>
        <form action="/posts/{{$key->id}}" method="POST">
  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
{{$getData->links()}}
</div>
<body>
@endsection
