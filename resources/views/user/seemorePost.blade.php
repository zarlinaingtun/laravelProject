<x-pagelayout>
<div class="container">
    <div class="my-3" align="center">
    <img src="{{asset('images/postPhotos/'.$post->image)}}"  alt="postPhoto"  width="800px" height="400px" />
    </div>
    <h3 class="my-2" align="center"><u><b>{{$post->title}}</b></u></h3>
    <p>{{$post->content}}</p>
   
    @can("premiumAdminPostowner",$post->id)
    <div align="center">
    <a href="{{route('editPost',$post->id)}}" class="btn btn-success">Edit Post</a>
    <a href="{{route('deletePost',$post->id)}}" class="btn btn-danger">Delete Post</a>
    </div>
    @endcan
</div>
</x-pagelayout>
