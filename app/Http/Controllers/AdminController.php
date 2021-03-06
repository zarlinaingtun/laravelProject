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
    
    //call editUser blade by id
    function editUser($id){
        //get user data by id
        $editUser=User::find($id);
        return view('admin.edituser',["editUser"=>$editUser]);
    }

     //admin is update userdata by id
    function updateUser($id){
        //validation
        $validation=request()->validate([
            "name"=>"required",
            "email"=>"required",
            "isAdmin"=>"required",
            "isPremium"=>"required",
        ]);
        if($validation){
            //grap that user data from db by id
            $updateUser=User::find($id);
            //override that data
            $updateUser->name=request('name');
            $updateUser->email=request('email');
            $updateUser->isAdmin=request('isAdmin');
            $updateUser->isPremium=request('isPremium');
            //update that data
            $updateUser->update();
            return back()->with('message',"Userdata updated");
        }
        else{
            return back()->withErrors($validation);
        }
    }
}
