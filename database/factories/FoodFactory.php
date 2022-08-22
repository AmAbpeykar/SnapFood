<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name() ,
            'food_category_id' => rand(1 , 2),
            'restaurant_id' => random_int(1 ,10) ,
            'price' => $this->faker->randomFloat(null , 1000 , 10000) ,
            'quantity' => $this->faker->randomNumber()
        ];
    }
}
