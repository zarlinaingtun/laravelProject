<x-adminlayout>
        <form class="text-center" style="color: #757575;" action="{{route('updateMessage',$updateData->id)}}" method="post">
        @csrf
         <h5 class="pink-text text-center py-4">
         <strong><u>Edit Message Form</u></strong>
         </h5>
        <!-- Username -->
        <div class="md-form">
          <input type="text" name="username" id="materialLoginFormusername" class="form-control" value="{{$updateData->username}}">
          <label for="materialLoginFormusername">Username</label>
          @error('username')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
  
        <!-- Email -->
        <div class="md-form">
          <input type="email" name="email" id="materialLoginFormemail" class="form-control" value="{{$updateData->email}}">
          <label for="materialLoginFormemail">Email</label>
          @error('email')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <!-- Message -->
        <div class="md-form">
          <textarea name="message" id="materialLoginFormMessage" cols="30" rows="10" class="form-control">{{$updateData->messages
          }}</textarea>
          <label for="materialLoginFormMessage">Your Message</label>
          @error('message')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
  
        <!-- Button -->
        <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 pink white-text" type="submit">Update</button>
      </form>
</x-adminlayout>