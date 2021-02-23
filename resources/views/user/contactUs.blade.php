@extends('layouts.pagelayout')
@section('content')
<div class="container-fluid">
    <h1 class="my-3">Contact</h1>
    <div class="row">
        <div class="col-md-6">
            <!-- map here -->
        </div>
        <div class="col-md-6">
            <!-- form -->
        <form class="text-center" style="color: #757575;" action="#!">
         <h5 class="pink-text text-center py-4">
         <strong><u>Contact Us</u></strong>
         </h5>
        <!-- Username -->
        <div class="md-form">
          <input type="text" id="materialLoginFormusername" class="form-control">
          <label for="materialLoginFormusername">Username</label>
        </div>
  
        <!-- Email -->
        <div class="md-form">
          <input type="email" id="materialLoginFormemail" class="form-control">
          <label for="materialLoginFormemail">Email</label>
        </div>

        <!-- Message -->
        <div class="md-form">
          <textarea id="materialLoginFormMessage" cols="30" rows="10" class="form-control"></textarea>
          <label for="materialLoginFormMessage">Your Message</label>
        </div>
  
        <!-- Button -->
        <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 pink white-text" type="submit">Send Message</button>
      </form>
        </div>
    </div>
</div>


@endsection