<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    function login() {
        return view('auth.login');
    }
    function post_login(){
       //validate our input field
            $validation=request()->validate([
                "email"=>"required",
                "password"=>"required",
            ]);
       //if validation success
       if($validation){
           //auth our input field
          $auth=Auth::attempt(["email"=>$validation['email'],"password"=>$validation['password']]);
           //if auth is success
           if($auth){
               //go to home page
               $loginuser=auth()->user()->name;
               return redirect()->route("home")->with("registersms","Successfully Login. $loginuser! Welcome from our social app");

           }
           //else auth is failed
           else{
               //go back login page with auth failed error
               return back()->with('autherr',"Authentication Failed!Try Again");
               
           }
       
     }
       //else validation fail
       else{
           //go back login page withErrors
           return back()->withErrors($validation);
       }
    }

    //register
    function register() {
        return view('auth.register');
    }
    function post_register(){
        // return request('username');
        // return $req->username;
        $validation=request()->validate([
            //associated array 
            "username"=>"required",
            "email"=>"required",
            "password"=>"required || min:8",
            "image"=>"required",
        ]);
       
        if($validation)//validation true
        {   //$validation->associated array type nae data par lar ml 
          
            $image=request('image');//image file win lar ml //move to public path
            $image_name=uniqid()."_".$image->getClientOriginalName();//get user's input image's name //save to database
            //asfsf123_secreenshot.jpg,aser3dj_secreenshot.jpg

            //move image file to public path,move(path,name)
            $image->move(public_path('/images/profiles'),$image_name);
            
            //save to database
            $username=$validation['username'];
            $user=new User();
            $password=$validation['password'];
            $user->name=$validation['username'];
            $user->email=$validation['email'];
            $user->password=Hash::make($password);
            $user->image=$image_name;
            //take 1 or 2s to save data in database
            $user->save();
             if(Auth::attempt(["email"=>$validation['email'],"password"=>$validation['password']]))
             {
                 return redirect()->route("home")->with("registersms","Successfully Register. $username! Welcome From Our Social App");
             }
        }
        else//validation false//$validation=null \
        {         
            return back()->withErrors($validation);
        }
    }

    //logout
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
    //userprofile
    function post_userProfile(){
        $name=request('name');
        $email=request('email');
        $image=request('image');
        $old_password=request('old_password');
        $new_password=request('new_password');
        // dd($name,$email,$image,$old_password,$new_password);
        $id=auth()->user()->id;
        $current_user=User::find($id);
        
       
        $validation=request()->validate([
            "name"=>"required",
            "email"=>"required"
        ]);
      
       //Validation is success
        if($validation){
            //if user is not select image and not changed password(add name and email to current user's id)
            $current_user->name=$name;
            $current_user->email=$email;
            $current_user->update();
            //Changing image
            if($image){
                //move file to public path
                $imageName=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('/images/profiles/'),$imageName);
    
                //save image name to current user's id
                $current_user->image=$imageName;
                $current_user->update();
                // return back()->with('success',"Image Changed!");
            }

            //Changing pw
            if($old_password && $new_password){
                //check user's input old_password is same as current user's pw in db//123456=$2gdsmljfdsahfaj
               if(Hash::check($old_password,$current_user->password)){
                 //if same
                 //let user to change new password
                 $current_user->password=Hash::make($new_password);
                 $current_user->update();
                //  return back()->with('success',"Changed password successfully!");
               }
               //not same
               else{
                 return back()->with('error',"Sorry!! Your old password is incorrect.");
               }    
            }
            
           
            return back()->with('success',"Your Profile Data Changes is successfully!");
        }

        //Validation is not success
        else{
            return back()->withErrors($validation);
        }

    }
  
}
