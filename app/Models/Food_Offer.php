<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Offer extends Model
{
    use HasFactory;



    protected $fillable = ['food_id' , 'offer_id'];

    protected $table = 'food_offer';
}
