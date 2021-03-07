<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //post user's message to admin
    function post_contact_message(){
        //validate
        $validation=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
            //get input  data from input field
            $username=$validation['username'];
            $email=$validation['email'];
            $message=$validation['message'];
            //save that data to database
           $usersms=new ContactMessage();//connect with contact_messages table using model
           $usersms->username=$username;
           $usersms->email=$email;
           $usersms->messages=$message;
           $usersms->save();
           return back()->with('message',"Send Your Data to Admin!");
        }
        else{
            return back()->withErrors($validation);
        }
    }
}
