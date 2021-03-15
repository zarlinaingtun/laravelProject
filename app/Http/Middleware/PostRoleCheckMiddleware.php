<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    //or gate
        //check current user is premium or not
        //check current user is admin or not

        //check that post is current user post
        //1.that post id
        $id=request('id');
        //2.that post user_id(author_id)
        $authorId=Post::find($id)->user_id;
        //3.check author_id==currentuserId

        if(auth()->user()->isAdmin=='1' || auth()->user()->isPremium=='1' || auth()->user()->id==$authorId){
            return $next($request);//delete,edit,update post
        }
        else{
            return redirect()->route('home')->with('errors',"You are not admin or premium user");
        }
       
    }
}
