@extends('layouts.pagelayout')
@section('content')
<div class="container">
    <h1 class="my-3">Create Post</h1>
 <!-- add post form    -->
<form action="{{route('post')}}" method="post" class="border border-light p-5" enctype="multipart/form-data">
@csrf 
{{-- title --}}
    <label for="">Title</label>   
    <input type="text" name="title" id="defaultLoginFormTitle" class="form-control mb-4" >
    @error('title')
   <p class="text-danger">{{$message}}</p>
    @enderror
{{-- image --}}
    <label for="defaultLoginFormPhoto">Photo</label>
    <input type="file" name="image" id="defaultLoginFormPhoto" class="form-control mb-4">
    @error('image')
   <p class="text-danger">{{$message}}</p>
    @enderror
{{-- Content --}}
    <label for="">Content</label>
    <textarea name="content" class="form-control mb-4" rows="10" cols="30"></textarea>
    @error('content')
   <p class="text-danger">{{$message}}</p>
    @enderror
    <!--Add post button -->
    <button class="btn btn-outline-pink btn-block my-4" type="submit">Add Post</button>
</form>

</div>

@endsection