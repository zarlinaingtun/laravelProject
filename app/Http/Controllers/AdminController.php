<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class AdminController extends Controller
{
    //call admin home page
    function index(){
        return view("admin.adminindex");
    }
    
    //call manage_premium_users page
    function manage_premium_users(){
       $users=User::all();
        return view("admin.manage_premium_users",["users"=>$users]);

    }
    //call contact_messages page
    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view("admin.contact_messages",["messages"=>$messages]);
    }

    //admin is delete user by id
    function deleteUser($id){ 
        //find deleteuser by id from db
        $deleteUser=User::find($id);
        //delete that user
        $deleteUser->delete();
        //return back
        return back()->with('message',"Deleted User:$deleteUser->name");

    }
}
