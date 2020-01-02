@extends('layout.app');

	@section('content');
	<div class="container-fluid">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
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
  </tbody>
</table>
</div>
@endsection


