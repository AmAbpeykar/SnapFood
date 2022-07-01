<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkingHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//         Role::create(['role' => 'user']);
//         Role::create(['role' => 'admin']);
//         Role::create(['role' => 'seller']);
// //
//         User::create([
//             'name' => 'admin',
//             'email' => 'admin@gmail.com',
//             'password' =>'1234',
//             'role_id' => 2
//         ]);

//         User::create([
//             'name' => 'user',
//             'email' => 'user@gmail.com',
//             'password' => bcrypt(1234),
//             'role_id' => 1
//         ]);
// //
//         User::create([
//             'name' => 'seller2',
//             'email' => 'seller2@gmail.com',
//             'password' => 1234,
//             'role_id' => 3
//         ]);

//         FoodCategory::create([
//             'food_category_id' => 1,
//             'name' => 'Fast Food'
//         ]);

//         FoodCategory::create([
//             'food_category_id' => 1,
//             'name' => 'Random'
//         ]);

//         RestaurantCategory::create([
//            'restaurant_category_id' => 1,
//             'name' => 'random'
//         ]);

//         RestaurantCategory::create([
//            'restaurant_category_id' => 1,
//             'name' => 'random2'
//         ]);

        WorkingHour::create([
            'monday' => '9-21',
            'thuesday' => '9-21',
            'saturday' => '9-21',
            'thursday' => '9-21',
            'sunday' => '9-21',
            'wednesday' => '9-21',
        ]);
    }
}
