<x-adminlayout>
<h1>Manage_premium_users Page</h1>
{{-- Table --}}
<table class="table table-hover mt-2">
  <thead class="green white-text">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">isAdmin</th>
      <th scope="col">isPremium</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><b>{{$user->isAdmin=='0' ? "FALSE":"TRUE" }}</b></td>
      <td><b>{{$user->isPremium=='0' ? "FALSE":"TRUE"}}<b></td>
      <td><a href="{{route('editUser',$user->id)}}" class="btn btn-sm btn-success">Update</a></td>
      <td><a href="{{route('deleteUser',$user->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
    </tr>
    @endforeach

  </tbody>
</table>
</x-adminlayout>