<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 1(post) to 1(user) relationship(belongsTo)
    //correct naming conversion
    function user(){
        return $this->belongsTo(User::class);//user model(user_id)
     }
     //OR
     /*incorrect naming conversation
    function myuser(){
       return $this->belongsTo(User::class,"user_id");//user model
    }*/


    // post1->user1(1->1)
    //user1->posts  (many)1->many
   
}
