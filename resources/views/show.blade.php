@extends('layout.app');

	@section('content');
	<div class="container-fluid">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Commented_By</th>
      <th scope="col">CreatedAt</th>
    </tr>
  </thead>
  <tbody> 
   <tr>
      <th scope="row">{{$getDataById->id}}</th>
      <td>{{$getDataById->title}}</td>
      <td>{{$getDataById->description}}</td>
      <td>{{$getDataById->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div>
  <h1>Post Created Info</h1>
 <h3>Name: {{$getDataById->user->name}}</h3>
 <h3>Email: {{$getDataById->user->email}}</h3>
 <h3>Created_At: {{$getDataById->user->created_at}}</h3>
</div> 
@endsection


