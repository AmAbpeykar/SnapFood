<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();

        $carts = Cart::where('user_id' , $user_id)->get();

        foreach($carts as $cart){
            $cart['total_price'] = 0;
            foreach($cart->cartItems as $cartItem){
                $cart['total_price'] += $cartItem['count'] * $cartItem->food['price'];
            }
        }

        return view('User.user-panel' , ['orders' => $carts]);

    }
}
