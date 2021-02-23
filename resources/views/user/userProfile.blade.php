@extends('layouts.pagelayout')
@section('content')
<h1 class="text-center my-4">User Profile</h1>
<div class="container">
   
        <form class="border border-light p-5"  action="#!" enctype="multipart/form-data">
        <label for="">Username</label>   
        <input type="text" id="defaultLoginFormTitle" class="form-control mb-4">
    
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control mb-4">
    
        <label for="photo">Photo</label>
        <input type="file" id="photo" class="form-control mb-4">
    
        <label for="oldpassword">Old Password</label>
        <input type="password" id="oldpassword" class="form-control mb-4">
    
        <label for="newpassword">New Password</label>
        <input type="password" id="newpassword" class="form-control mb-4">
       
        <!--Add post button -->
        <button class="btn btn-outline-pink btn-block my-4" type="submit">Add Post</button>
    </form>
    
</div>

    

@endsection