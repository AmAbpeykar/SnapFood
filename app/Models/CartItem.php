<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['count' , 'food_id' , 'cart_id'];

    protected $table = 'cart_items';

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function total()
    {
        return $this->food['price'] * $this['count'];
    }


}
