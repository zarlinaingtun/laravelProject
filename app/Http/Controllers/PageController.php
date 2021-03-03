<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    //index
    function index() {
        $posts=Post::all();
        return view('index',["posts"=>$posts]);
    }

    //post
    function createPost(){
        return view('user.createPost');
    }
    function post(){
        return redirect()->route("home")->with("message","added post");
    }

    //userProfile
    function userProfile(){
        return view('user.userProfile');
    }
    function post_userProfile(){
        $name=request('name');
        $email=request('email');
        $image=request('image');
        $old_password=request('old_password');
        $new_password=request('new_password');
        // dd($name,$email,$image,$old_password,$new_password);
        $id=auth()->user()->id;
        $current_user=User::find($id);
        
       
        $validation=request()->validate([
            "name"=>"required",
            "email"=>"required"
        ]);
      
       //Validation is success
        if($validation){
            //if user is not select image and not changed password(add name and email to current user's id)
            $current_user->name=$name;
            $current_user->email=$email;
            $current_user->update();
            //Changing image
            if($image){
                //move file to public path
                $imageName=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('/images/profiles/'),$imageName);
    
                //save image name to current user's id
                $current_user->image=$imageName;
                $current_user->update();
                // return back()->with('success',"Image Changed!");
            }

            //Changing pw
            if($old_password && $new_password){
                //check user's input old_password is same as current user's pw in db//123456=$2gdsmljfdsahfaj
               if(Hash::check($old_password,$current_user->password)){
                 //if same
                 //let user to change new password
                 $current_user->password=Hash::make($new_password);
                 $current_user->update();
                //  return back()->with('success',"Changed password successfully!");
               }
               //not same
               else{
                 return back()->with('error',"Sorry!! Your old password is incorrect.");
               }    
            }
            
           
            return back()->with('success',"Your Profile Data Changes is successfully!");
        }

        //Validation is not success
        else{
            return back()->withErrors($validation);
        }

    }

    function contactUs(){
        return view('user.contactUs');
    }
    
}
