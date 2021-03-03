<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  //insert fake data to users table
       User::factory(10)->create();
    //    Post::factory(10)->create();//no need to write because use tinker
    }
}
