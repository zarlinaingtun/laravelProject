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
        $posts=Post::latest()->get();//id_20-id_1(revert select data from database)
        return view('index',["posts"=>$posts]);
    }

    //post
    function createPost(){
        return view('user.createPost');
    }
    function post(){
        $validation=request()->validate([
            "title"=>"required",
            "image"=>"required",
            "content"=>"required",
        ]);

        if($validation){
            $title=request('title');
            $image=request('image');//file
            $content=request('content');

            //save data to database
            $post=new Post();//connect to posts_table using Post eloquent model
            $post->user_id=auth()->user()->id;
            $post->title=$title;
            //image
            //1.move file to public path
            $imageName=uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/postPhotos/'),$imageName);
            //2.save image name to db of posts_table's image col
            $post->image=$imageName;
            $post->content=$content;
            $post->save();

            return redirect()->route("home")->with("message","added post");
        }
        else{
            //fail validation 
            return back()->withErrors($validation);
        }
      
    }
    //show seemorepost  by id
    function seemorePostById($id){
        $post=Post::find($id);//post
        return view('user.seemorePost',['post'=>$post]);
    }
    //delete post by id
    function deletePost($id){
       //get post data by id
       $delete_post=Post::find($id);
       //delete that post
       $delete_post->delete();
       //return page
       return redirect()->route('home')->with('message',"deleted post");

    }
    //edit post by id
    function editPost($id){
       $update_data=Post::find($id);
    //    dd($update_data);
    
       return view('user.editPost',["update_data"=>$update_data]);
    }
    //update post by id
    function updatePost($id){
        //get input data from edit post blade
        $title=request('title');
        $image=request('image');
        $content=request('content');

       
        //update data in db(require update id)
        $updateData=Post::find($id);
        $updateData->title=$title;
        $updateData->content=$content;

        if($image){
            //move image file to public path
            $imageName=uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/postPhotos'),$imageName);
            //image name to db
            $updateData->image=$imageName;
        }
        $updateData->update();
        //return back
        return back()->with('message',"updated post");

        
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
