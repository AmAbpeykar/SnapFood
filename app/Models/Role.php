<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const IS_USER = 1;
    const IS_ADMIN = 2;
    const IS_SELLER = 3;

    protected function users(){
        return $this->hasMany(User::class);
    }
}
