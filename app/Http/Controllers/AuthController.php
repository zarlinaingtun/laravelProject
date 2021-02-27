<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            
            //move image file to public path,move(path,name)
            $image->move(public_path('/ourimage/profiles'),$image_name);
            
            return redirect()->route("home")->with("registersms","Successfully Register! Welcome From Our Social App");
        }
        else//validation false//$validation=null \
        {         
            return back()->withErrors($validation);
        }
    }
}
