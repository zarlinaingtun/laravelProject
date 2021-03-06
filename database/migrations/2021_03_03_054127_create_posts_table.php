<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //Foreign Key
            // //first method
            // $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            
            //second method
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//connect to (users) table's id
            // $table->foreignId('author')->constrained();//authors
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
