<x-adminlayout>
   <form class="text-center" style="color: #757575;" action="{{route('updateUser',$editUser->id)}}" method="post">
        @csrf
         <h5 class="pink-text text-center py-4">
         <strong><u>Edit Userdata Form</u></strong>
         </h5>
        <!-- name -->
        <div class="md-form">
          <input type="text" name="name" id="materialLoginFormusername" class="form-control" value="{{$editUser->name}}">
          <label for="materialLoginFormusername">Name</label>
          @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
  
        <!-- Email -->
        <div class="md-form">
          <input type="email" name="email" id="materialLoginFormemail" class="form-control" value="{{$editUser->email}}">
          <label for="materialLoginFormemail">Email</label>
          @error('email')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

       {{-- isAdmin --}}
        <label>IsAdmin</label>
       <select name="isAdmin" class="form-control">
           <option value="1" {{$editUser->isAdmin=='1' ? "selected":""}}>True</option>
           <option value="0" {{$editUser->isAdmin=='0' ? "selected":""}}>False</option>
        </select>

       {{-- isPremium --}}
       <label>IsPremium</label>
       <select name="isPremium" class="form-control">
           <option value="1" {{$editUser->isPremium=='1' ? "selected":""}}>True</option>
           <option value="0" {{$editUser->isPremium=='0' ? "selected":""}}>False</option>
        </select>

        <!-- Button -->
        <button class="btn btn-rounded btn-block my-4 waves-effect z-depth-0 pink white-text" type="submit">Update User</button>
      </form>
</x-adminlayout>