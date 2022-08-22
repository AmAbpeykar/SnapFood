<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Food;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
                'food_id' => 'integer|exists:foods,id',
                'cart_id' => 'integer',
                'count' => 'integer'
            ]
        );

        if($validated['count'] > Food::where('id' , $validated['food_id'])->first()['quantity']){
            return 'count is more than food quantity';
        }

        if(empty(Cart::find($validated['cart_id']))){
            Cart::create(['id' => $validated['cart_id'] , 'user_id' => Auth::id()]);
        }

        CartItem::create($validated);

    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'exists:carts,id' ,
            'food_id' => 'exists:foods,id' ,
            'count' => 'integer'
        ]);

        $cartItem = CartItem::where('cart_id' , $validated['cart_id'])->where('food_id' , $validated['food_id'])->first();

        if(!is_null($cartItem))
        {
            if($validated['count'] == 0){
                $cartItem->delete();
                return 'cart item deleted successfully';
            }

            if($validated['count'] > $cartItem->food['quantity']){
                return 'count is more than food quantity';
            }

            $cartItem->update($validated);
            return 'cart item updated successfully.';
        }

        return 'cart item does not exist.';

    }

    public function inc($id)
    {
        $cartItem = CartItem::where('id' , $id)->first();

        $cartItem->update(['count' => $cartItem['count'] + 1]);

        return redirect()->route('user.panel');
    }

    public function dec($id)
    {
        $cartItem = CartItem::where('id' , $id)->first();

        if($cartItem['count'] === 1) {
            $cartItem->delete();
        }

        $cartItem->update(['count' => $cartItem['count'] - 1]);

        return redirect()->route('user.panel');
    }

    public function delete($id)
    {
        CartItem::where('id' , $id)->delete();

        return redirect()->route('user.panel');
    }
}
