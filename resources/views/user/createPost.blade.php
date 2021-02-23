@extends('layouts.pagelayout')
@section('content')
<div class="container">
    <h1 class="my-3">Create Post</h1>
 <!-- add post form    -->
<form class="text-center border border-light p-5"  action="#!" enctype="multipart/form-data">
    <label for="">Title</label>   
    <input type="text" id="defaultLoginFormTitle" class="form-control mb-4" >
    <label for="defaultLoginFormPhoto">Photo</label>
    <input type="file" id="defaultLoginFormPhoto" class="form-control mb-4">
    <label for="">Content</label>
    <textarea class="form-control mb-4" rows="10" cols="30"></textarea>
    <!--Add post button -->
    <button class="btn btn-outline-pink btn-block my-4" type="submit">Add Post</button>
</form>

</div>

@endsection