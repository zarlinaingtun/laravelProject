<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class AdminController extends Controller
{
    //
    function index(){
        return view("admin.adminindex");
    }

    function manage_premium_users(){
       $users=User::all();
        return view("admin.manage_premium_users",["users"=>$users]);

    }
    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view("admin.contact_messages",["messages"=>$messages]);
    }
}
