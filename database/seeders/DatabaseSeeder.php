<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Food_Offer;
use App\Models\FoodCategory;
use App\Models\Offer;
use App\Models\Restaurant;
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


//       Create Roles
         Role::create(['role' => 'user']);
         Role::create(['role' => 'admin']);
         Role::create(['role' => 'seller']);
//       Create Users
         User::create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' =>'1234',
             'role_id' => 2
         ]);

         User::create([
             'name' => 'user',
             'email' => 'user@gmail.com',
             'password' => '1234',
             'role_id' => 1
         ]);

         User::create([
             'name' => 'seller',
             'email' => 'seller@gmail.com',
             'password' => 1234,
             'role_id' => 3
         ]);
         //Create Food Categories
         FoodCategory::create([
             'name' => 'Fast Food'
         ]);

         FoodCategory::create([
             'name' => 'Sonnati'
         ]);

         RestaurantCategory::create([
             'name' => 'FastFood'
         ]);

         RestaurantCategory::create([
             'name' => 'Sonnati'
         ]);

        Banner::create([
            'name' => 'top_banner' ,
            'image_path' => '1656733138_Kikuchi Momoe.jpg' ,
        ]);

        Banner::create([
            'name' => 'middle_banner' ,
            'image_path' => '1656733138_Kikuchi Momoe.jpg' ,
        ]);

        Cart::create([
            'user_id' => 2
        ]);

        CartItem::create([
            'cart_id' => 1 ,
            'food_id' => 1 ,
            'count' => 3
        ]);

        CartItem::create([
            'cart_id' => 1 ,
            'food_id' => 2 ,
            'count' => 2
        ]);

        Offer::factory()->count(10)->create();

        Food::create([
            'name' => 'kebab',
            'food_category_id' => 2 ,
            'restaurant_id' => 1,
            'price' => 50000/500 ,
            'quantity'  => 10
        ]);

        Food::create([
            'name' => 'pizza',
            'food_category_id' => 1 ,
            'restaurant_id' => 1,
            'price' => 60000/500 ,
            'quantity'  => 10
        ]);

        Food::factory()->count(30)->create();

        Restaurant::factory()->count(15)->create();

        Food_Offer::factory()->count(7)->create();

        WorkingHour::create([
            'open' => '9:00:00' ,
            'close' => '21:00:00'
        ]);

        Comment::create([
           'title' => 'By Me' ,
            'content' => 'Test' ,
            'cart_id' => 1 ,
            'score' => 1 ,
            'food_id' => 1 ,
            'status' => 1
        ]);


        Comment::factory()->count(4)->create();

    }


}
