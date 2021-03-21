<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',function(){
    $posts=Post::all();
    return response()->json($posts);
}); //http://localhost:4000/public/api/posts

Route::get('/posts/{id}',function($id){
    $post=Post::find($id);
    return response()->json($post);//return with json format
}); //http://localhost:4000/public/api/posts/14

Route::post('/posts/create',function(){
    $post=new Post();
    $post->user_id=request('user_id');
    $post->title=request('title');
    $post->content=request('content');
    $post->image=request('image');
    $post->save();
    return "Created Post";

});//http://localhost:4000/public/api/posts/create

Route::delete('/deletepost/{id}',function($id){
    $deletepost=Post::find($id);
    $deletepost->delete();
    return "deleted post";
});// http://localhost:4000/public/api/deletepost/14
