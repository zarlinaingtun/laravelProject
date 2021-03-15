<x-pagelayout>
<div class="container">
    <h1 class="my-3">Edit Form</h1>
 <!-- add post form    -->
<form action="{{route('updatePost',$update_data->id)}}" method="post" class="border border-light p-5" enctype="multipart/form-data">
@csrf 
{{-- title --}}
    <label for="">Title</label>    
    <input type="text" name="title"  id="defaultLoginFormTitle" class="form-control mb-4" value="{{$update_data->title}}">
  
{{-- image --}}
    <label for="defaultLoginFormPhoto">Photo</label>
    <input type="file" name="image" id="defaultLoginFormPhoto" class="form-control mb-4">
    <img src="{{asset('images/postPhotos/'.$update_data->image)}}" alt="postphoto" class="my-2" width="300px" height="250px"/><br>
  
{{-- Content --}}
    <label for="">Content</label>
    <textarea name="content" class="form-control mb-4" rows="10" cols="30">
    {{$update_data->content}}
    </textarea>

    <!--Update post button -->
    <button class="btn btn-outline-pink btn-block my-4" type="submit">Update Post</button>
</form>

</div>

</x-pagelayout>



