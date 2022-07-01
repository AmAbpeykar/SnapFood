<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    public function show(Request $request , $id){

        $restaurant = Restaurant::find($id);

        return response()->json(['Information' => $restaurant ]);
    }

    public function index($is_open = null , $type = null , $score_gt = null ){

        $weekMap = [
            0 => 'sunday',
            1 => 'monday',
            2 => 'tursday',
            3 => 'wednesday',
            4 => 'thursday',
            5 => 'friday',
            6 => 'saturday',
        ];

        $restaurants = Restaurant::all();

        // if($is_open !== 'null' && $is_open == true){
        //     $rest = Restaurant::all();
        //         foreach($rest as $res){
        //             if($res->working_hour[$weekMap[Carbon::now()->dayOfWeek]] > time()){
                            
        //                 $restaurants[] = $res;

        //             }
        //         }
                
        // }

        if($type !== 'null'){

            $restaurants = $restaurants->where('type' , $type);

            
        }

        if($score_gt !== 'null'){
            
           $restaurants = $restaurants->where('score_gt' , '>' , $score_gt);

        }

        return $restaurants;

    }

    public function foods($id){

        $foods = Restaurant::find($id)->foods;

        return $foods;
    }
}
