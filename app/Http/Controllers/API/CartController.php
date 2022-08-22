<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

        $id = Auth::id();

        $cart = Cart::where('user_id' , $id)->get();



        if(empty($cart['items'])){
            return 'you haven\'t any carts';
        }

        return $cart;
    }

    public function show($id)
    {
        $user_id = Auth::id();

        $cart = Cart::where('id' , $id)->where('user_id' , $user_id)->first();

        if(empty($cart)){
            return 'There are no cards with this specification.';
        }

        return $cart;

    }

    public function pay($id)
    {
        $user_id = Auth::id();

        $cart = Cart::where('id' , $id)->where('user_id' , $user_id)->first();

        if(empty($cart)){
            return 'There are no cards with this specification.';
        }
        if($cart['paid']){
            return 'paid';
        }

        Cart::where('id' , $id)->where('user_id' , $user_id)->update(['paid' => true]);

        return 'successful';

    }

    public function delete($id)
    {

        Cart::where('id' , $id)->delete();

        return redirect()->route('user.panel')->with('message' , 'Successful');

    }
}
