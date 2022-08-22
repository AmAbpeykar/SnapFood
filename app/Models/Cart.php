<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = ['id' , 'user_id'];

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected function paid(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 1 ? 'paid' : 'not paid',
        );
    }

    protected function status(): Attribute
    {
            return Attribute::make(
              get: function ($value){
                  if($value == 1){
                      return 'pending';
                  }elseif ($value == 2){
                      return 'preparing';
                  }elseif($value == 3){
                      return 'sending';
                  }elseif ($value == 4){
                      return 'delivered';
                  }
                }
            );
    }



    public function total()
    {
        $total = 0 ;

        foreach($this->cartItems as $cartItem){
            $total += $cartItem->total();
        }


        return $total;
    }

}
