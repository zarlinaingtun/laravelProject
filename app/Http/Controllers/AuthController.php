<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    function login() {
        return view('auth.login');
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
            $image->move(public_path('/ourimage/profiles'),$image_name);
            
            //save to database
            $user=new User();
            $password=$validation['password'];
            $user->name=$validation['username'];
            $user->email=$validation['email'];
            $user->password=Hash::make($password);
            $user->image=$image_name;
            $user->save();

            return redirect()->route("home")->with("registersms","Successfully Register! Welcome From Our Social App");
        }
        else//validation false//$validation=null \
        {         
            return back()->withErrors($validation);
        }
    }
}
