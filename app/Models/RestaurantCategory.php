<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $table = 'restaurants_categories';

    protected $fillable = ['restaurant_category_id' , 'name'];

    protected function restaurants(){
        return $this->hasMany(Restaurant::class);
    }

}
