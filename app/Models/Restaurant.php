<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'address' , 'user_id' , 'working_hour_id', 'score_gt' , 'type' , 'latitude' , 'longitude'];


    protected function user(){
        return $this->belongsTo(User::class);
    }

    protected function foods(){
        return $this->hasMany(Food::class);
    }

    protected function category(){
        return $this->belongsTo(RestaurantCategory::class);
    }

    public function working_hour(){
        return $this->belongsTo(WorkingHour::class);
    }

}
