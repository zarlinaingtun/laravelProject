@extends("layouts.authlayout")
@section("content")
    <div class="container">
        <div class="col-md-4 offset-4 mt-5">
           
<div class="card">

    <h5 class="card-header pink white-text text-center py-4">
        <strong>Register</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form action="{{route("post_register")}}" method="post" class="text-center" style="color: #757575;" enctype="multipart/form-data">
        @csrf
            <!-- Username -->
            <div class="md-form mt-3">
                <input type="text" name="username" id="materialRegisterFormEmail" class="form-control mt-2">
                <label for="materialRegisterFormEmail">Username</label>
                @error('username')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="md-form">
                <input type="email" name="email" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword">Email</label>
               @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" name="password" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="materialRegisterFormPhone">Password</label>
              @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <!-- Upload Profile -->
            <p>Select Your Profile</p>
            <div class="md-form">
                <input type="file" name="image" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock"> 
            @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            

            <!--Register button -->
            <button class="btn btn-outline-pink btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>
            <p>
                <a href="{{route('login')}}">Already Register?</a>
              </p>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
        </div>
    </div>
@endsection
