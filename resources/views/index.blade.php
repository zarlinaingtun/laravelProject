{{-- @extends("layouts.pagelayout")
@section('content') --}}
<x-pagelayout>
{{-- <h1>{{auth()->user()->name}}</h1> --}}
<!-- background image -->
    <header></header>
 
{{-- all posts --}}
<div class="container">
 <h1 class="mt-3">All Posts</h1>
<div class="row">
     {{-- range(1,8)->[1,2,3,4,5,6,7,8] include 1 and 8b--}}
     {{-- @foreach (range(1,8) as $index) --}}
     @foreach ($posts as $post)
     {{-- All Post --}}
  <div class="col-md-4">
  <div class="card my-3">
    <!-- Card image -->
    <div class="view overlay">
      <img class="card-img-top"  height=250px src="{{asset('images/postPhotos/'.$post->image)}}"
        alt="Card image cap">
    </div>
  
    <!-- Card content -->
    <div class="card-body">
  
      <!-- Title -->
      <h4 class="card-title">{{$post->title}}</h4><p>(Posted By {{$post->user->name}})</p>
      <!-- Button -->
      <a href="{{route("seemorePostById",$post->id)}}" class="btn white-text pink">See more</a>
    </div>
  </div>
</div> 
     @endforeach  

     {{-- Pagination used default Tailwind Css need to change bootstrap css --}}
   
        </div>
    </div>
  {{$posts->links()}}
</x-pagelayout>
{{-- @endsection --}}


