<?php

namespace App\Http\Controllers;

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
        return view("admin.contact_messages");
    }
}
