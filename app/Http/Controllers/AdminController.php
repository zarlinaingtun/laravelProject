<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
        return view("admin.adminindex");
    }

    function manage_premium_users(){
        return view("admin.manage_premium_users");

    }
    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view("admin.contact_messages",["messages"=>$messages]);
    }
}
