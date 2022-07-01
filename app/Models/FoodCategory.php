<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table = 'foods_categories';

    protected $fillable = ['name' , 'food_category_id'];

    protected function foods(){
        return $this->hasMany(Food::class);
    }
}
