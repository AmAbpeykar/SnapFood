<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 3 ,
            'name' => $this->faker->name(),
            'address' => $this->faker->address() ,
            'working_hour_id' => 1,
            'restaurant_category_id' => random_int(1,2)

        ];
    }
}
