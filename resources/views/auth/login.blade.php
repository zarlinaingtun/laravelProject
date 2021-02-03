@extends("layouts.authlayout")
@section("content")
    
    <div class="container">
        <div class="col-md-4 offset-4 mt-5">
            <!-- Material form login -->
<div class="card">

    <h5 class="card-header pink white-text text-center py-4">
      <strong>Sign in</strong>
    </h5>
  
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
  
      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="#!">
  
        <!-- Email -->
        <div class="md-form">
          <input type="email" id="materialLoginFormEmail" class="form-control">
          <label for="materialLoginFormEmail">E-mail</label>
        </div>
  
        <!-- Password -->
        <div class="md-form">
          <input type="password" id="materialLoginFormPassword" class="form-control">
          <label for="materialLoginFormPassword">Password</label>
        </div>
  
     
          <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
          </div>
      
  
        <!-- Sign in button -->
        <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 pink white-text" type="submit">Sign in</button>
  
        <!-- Register -->
        <p>
          <a href="{{route('register')}}">Register</a>
         
        </p>
  
       
  
      </form>
      <!-- Form -->
  
    </div>
  
  </div>
  <!-- Material form login -->
        </div>
    </div>
 
@endsection
