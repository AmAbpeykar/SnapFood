<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id' , 'score' , 'content' , 'title' , 'user_id' , 'status'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 0 ? 'unconfirmed' : 'confirmed',
        );
    }

}
