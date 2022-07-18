<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public static function delete($id)
    {
       return Food::find($id)->delete();
    }

    public static function update($id , $input)
    {
        Food::where('id' , $id)->update($input);
    }

    public static function store($input){
        Food::create($input);
    }

}
