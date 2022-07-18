<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['name' , 'price' , 'image' , 'category' , 'in_food_party' , 'food_category_id' , 'restaurant_id'];



protected function foodCategory(){
        return $this->belongsTo(FoodCategory::class);
}


    protected function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    protected function offers(){
       return $this->belongsToMany(Offer::class);
    }

   public function cartItems(){
    return $this->hasMany(CartItem::class);
   }

}
