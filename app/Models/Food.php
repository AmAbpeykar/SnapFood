<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['name' , 'price' , 'image' , 'category' , 'in_food_party' , 'offer_id'];



protected function foodCategory(){
        return $this->belongsTo(FoodCategory::class);
}


    protected function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    protected function offers(){
       return $this->belongsTo(Offer::class);
    }

}
