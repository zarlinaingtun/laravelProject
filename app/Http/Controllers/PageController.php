<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //index
    function index() {
        return view('index');
    }
    function createPost(){
        return view('user.createPost');
    }
}
