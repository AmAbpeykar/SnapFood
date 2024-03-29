<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $table = 'working_hours';

    protected $fillable = ['open' , 'close'];

    public function restaurants(){
        return $this->hasMany(Restaurant::class);
    }

}
