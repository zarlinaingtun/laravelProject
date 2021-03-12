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
        //get all post in db
        $posts=Post::latest()->get();//id_20-id_1(revert select data from database)
        //return page
        return view('index',["posts"=>$posts]);

       
  //one to one(belongsTo())
  //$post=Post::find(3);
  //dd($post->user->toArray());

 //one to many(hasMany())
 // $user=User::find(3);
 // dd($user->myposts->toArray());  

        //one to one(belongsTo())
        //one to many(hasMany())
        //many to many
    }

    //post
    function createPost(){
        return view('user.createPost');
    }
    
    //show seemorepost  by id
    function seemorePostById($id){
        $post=Post::find($id);//post
        return view('user.seemorePost',['post'=>$post]);
    }
   
    //edit post by id
    function editPost($id){
       $update_data=Post::find($id);
    //    dd($update_data);
    
       return view('user.editPost',["update_data"=>$update_data]);
    }
  
    //userProfile
    function userProfile(){
        return view('user.userProfile');
    }
    

    function contactUs(){
        return view('user.contactUs');
    }
    
}
