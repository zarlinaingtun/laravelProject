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
        {   //save to database

            //$validation->associated array type nae data par lar ml 
            return redirect()->route("home")->with("registersms","Successfully Register! Welcome From Our Social App");
        }
        else//validation false
        {         
            return back()->withErrors($validation);
        }
    }
}
