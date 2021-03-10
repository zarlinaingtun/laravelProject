<x-pagelayout>
@if(Session('success'))
<div class="alert alert-success">
    {{Session('success')}}
</div>
@endif
@if(Session('error'))
<div class="alert alert-danger">
    {{Session('error')}}
</div>
@endif
<h1 class="text-center my-4">User Profile</h1>
<div class="container">
        
        <form action="{{route('post_userProfile')}}" method="POST" class="border border-light p-5"  enctype="multipart/form-data">
        @csrf
        <label for="">Username</label>   
        <input type="text" name="name" id="defaultLoginFormTitle" class="form-control mb-4" value="{{auth()->user()->name}}">
        @error('name')
         <p class="text-danger">{{$message}}</p>    
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control mb-4" value="{{auth()->user()->email}}">
        @error('email')
         <p class="text-danger">{{$message}}</p>    
        @enderror

        <label for="photo">Photo</label>
        <input type="file" name="image" id="photo" class="form-control mb-4">
        <img src="{{asset('images/profiles/'.auth()->user()->image)}}" alt="propic" class="my-2" width="300px" height="250px"/><br>
    
        <label for="oldpassword">Old Password</label>
        <input type="password" name="old_password" id="oldpassword" class="form-control mb-4">
    
        <label for="newpassword">New Password</label>
        <input type="password" name="new_password" id="newpassword" class="form-control mb-4">
       
        <!--Update Profile button -->
        <button class="btn btn-outline-pink btn-block my-4" type="submit">Update profile</button>
    </form>
    
</div>

    

</x-pagelayout>