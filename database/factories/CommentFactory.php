<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'food_id' => random_int(1 , 20) ,
            'user_id' => random_int(1,4) ,
            'title' => 'Made From Factory' ,
            'content' => 'Made From Factory' ,
            'score' => random_int(1,5) ,
            'status' => $this->faker->boolean

        ];
    }
}
