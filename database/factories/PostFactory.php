<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),//22/23/24 //create new user and get this user's id
            "title"=>$this->faker->sentence,//column=>data
            "image"=>$this->faker->sentence,
            "content"=>$this->faker->sentence,
        ];
    }
}
