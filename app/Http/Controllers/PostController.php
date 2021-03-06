<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //create post
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
     //delete post by id
     function deletePost($id){
        //get post data by id
        $delete_post=Post::find($id);
        //delete that post
        $delete_post->delete();
        //return page
        return redirect()->route('home')->with('message',"deleted post");
 
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
}
