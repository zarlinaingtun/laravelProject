@extends("layouts.pagelayout")
@section('content')
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
      <img class="card-img-top"  height=250px src="{{asset('images/food1.jpg')}}"
        alt="Card image cap">
    </div>
  
    <!-- Card content -->
    <div class="card-body">
  
      <!-- Title -->
      <h4 class="card-title">{{$post->title}}</h4>
      <!-- Text -->
      <p class="card-text">{{$post->content}}</p>
      <!-- Button -->
      <a href="#" class="btn white-text pink">See more</a>
    </div>
  </div>
</div> 
     @endforeach       
        </div>
    </div>


@endsection
</body>
</html>