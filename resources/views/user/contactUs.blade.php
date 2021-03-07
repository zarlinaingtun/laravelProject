<x-pagelayout>
<div class="container-fluid">
    <h1 class="my-3">Contact</h1>
    <div class="row">
        <div class="col-md-6">
            <!-- map here -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63357720.9962692!2d162.15935287770182!3d59.2109884060223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2sTokyo!5e0!3m2!1sen!2sjp!4v1614097851334!5m2!1sen!2sjp" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6">
            <!-- form -->
        <form class="text-center" style="color: #757575;" action="{{route('post_contact_message')}}" method="post">
        @csrf
         <h5 class="pink-text text-center py-4">
         <strong><u>Contact Us</u></strong>
         </h5>
        <!-- Username -->
        <div class="md-form">
          <input type="text" name="username" id="materialLoginFormusername" class="form-control">
          <label for="materialLoginFormusername">Username</label>
          @error('username')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
  
        <!-- Email -->+
        <div class="md-form">
          <input type="email" name="email" id="materialLoginFormemail" class="form-control">
          <label for="materialLoginFormemail">Email</label>
          @error('email')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <!-- Message -->
        <div class="md-form">
          <textarea name="message" id="materialLoginFormMessage" cols="30" rows="10" class="form-control"></textarea>
          <label for="materialLoginFormMessage">Your Message</label>
          @error('message')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
  
        <!-- Button -->
        <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 pink white-text" type="submit">Send Message</button>
      </form>
        </div>
    </div>
</div>


</x-pagelayout>