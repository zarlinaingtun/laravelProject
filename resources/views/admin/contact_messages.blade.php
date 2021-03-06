@extends("layouts.adminlayout")
@section("content")
<h1>Contact Messages Page</h1>
<table class="table table-hover mt-2">
  <thead class="green white-text">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Messages</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($messages as $message )
      <tr>
      <td>{{$message->id}}</td>
      <td>{{$message->username}}</td>
      <td>{{$message->email}}</td>
      <td>{{$message->messages}}</td>
      <td><button class="btn btn-sm btn-success">Update</button></td>
      <td><button class="btn btn-sm btn-danger">Delete</button></td>
    </tr> 
  @endforeach
 

  </tbody>
</table>
@endsection