@extends("layouts.authlayout")
@section("content")
    <div class="container">
        <div class="col-md-4 offset-4 mt-5">
            <!-- Material form register -->
<div class="card">

    <h5 class="card-header pink white-text text-center py-4">
        <strong>Register</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <!-- Username -->
            <div class="md-form mt-3">
                <input type="email" id="materialRegisterFormEmail" class="form-control">
                <label for="materialRegisterFormEmail">Username</label>
            </div>

            <!-- Email -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword">Email</label>
                
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="materialRegisterFormPhone">Password</label>
              
            </div>
            <p>Select Your Profile</p>
            <div class="md-form">
                <input type="file" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock"> 
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
