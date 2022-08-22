<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show(Request $request){


        if(isset($request->input()['restaurant_id'])){
            $comment = Comment::where('restaurant_id' , $request->input()['restaurant_id'])->first();
        }

        if(isset($request->input()['food_id'])){
            $comment = Comment::where('food_id' , $request->input()['food_id'])->first();
        }

        if(is_null($comment)){
            return 'This Comment Does Not Exist';
        }

        return response()->json(['comment' => $comment]);

    }

    public function create(Request $request){

        $validated = $request->validate([
            'cart_id' => 'exists:carts,id',
            'score' => 'numeric|min:1|max:5',
            'content' => 'min:5|max:30',
            'title' => 'min:3|max:10'
        ]);

        $validated['user_id'] = Auth::id();

        Comment::create($validated);

    }


}
