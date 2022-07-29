<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function indexSeller(){

        $user_id = Auth::id();

        $carts = Cart::where('user_id' , $user_id)->get();

        foreach($carts as $cart){
            $cart['total_price'] = 0;
            foreach($cart->cartItems as $cartItem){
                $cart['total_price'] += $cartItem['count'] * $cartItem->food['price'];
            }
        }

        return view('Seller.orders' , ['orders' => $carts]);

    }

    public function indexAdmin()
    {
        $carts = Cart::where('status' , 4)->get();
        $total_price = 0;
        foreach($carts as $cart){
            $cart['total_price'] = 0;
            foreach($cart->cartItems as $cartItem){
                $cart['total_price'] += $cartItem['count'] * $cartItem->food['price'];
            }
            $total_price += $cart['total_price'];
        }



        return view('Admin.Orders' , ['orders' => $carts , 'total_price' => $total_price]);

    }
}
