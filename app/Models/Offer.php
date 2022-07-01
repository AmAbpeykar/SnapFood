<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['Percent' , 'food_id' , 'expiredtime'];

    protected function foods(){
        return $this->hasMany(Food::class);
    }
}
