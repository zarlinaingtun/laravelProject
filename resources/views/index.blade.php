@extends("layouts.pagelayout")
@section('content')
<!-- background image -->
    <header></header>
{{-- all posts --}}
<div class="container">
 <h1 class="mt-3">All Posts</h1>
<div class="row">
            
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
      <h4 class="card-title">Food1</h4>
      <!-- Text -->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <!-- Button -->
      <a href="#" class="btn white-text pink">See more</a>
    </div>
  </div>
  <!-- Card -->
</div>

<div class="col-md-4">
<div class="card my-3">
    <!-- Card image -->
    <div class="view overlay">
      <img class="card-img-top" height=250px src="{{asset('images/food2.jpg')}}"
        alt="Card image cap">
    </div>
  
    <!-- Card content -->
    <div class="card-body">
  
      <!-- Title -->
      <h4 class="card-title">Food2</h4>
      <!-- Text -->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <!-- Button -->
      <a href="#" class="btn white-text pink">See more</a>
      </div>
   </div>
  <!-- Card -->
</div>
<div class="col-md-4">
<!-- Card -->
<div class="card my-3">
    <!-- Card image -->
    <div class="view overlay">
      <img class="card-img-top" height=250px src="{{asset('images/food3.jpg')}}"
        alt="Card image cap">
    </div>
    <!-- Card content -->
    <div class="card-body">
     <!-- Title -->
      <h4 class="card-title">Food3</h4>
      <!-- Text -->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <!-- Button -->
      <a href="#" class="btn white-text pink">See more</a>
  </div>
  </div>
<!-- Card -->
            </div>
        </div>
    </div>


@endsection
</body>
</html>