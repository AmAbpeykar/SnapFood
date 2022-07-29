<?php

namespace App\Http\Controllers;

use App\Models\WorkingHour;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{


    public function create(Request $request)
    {


        return view('Seller.new_restaurant');

    }

    public function store(Request $request)
    {
        $restaurant  = $request->validate([
            'name' => 'min:3|max:20' ,
            'latitude' => 'integer' ,
            'longitude' => 'integer' ,
            'address' => 'min:3|max:40' ,
            'type' => 'min:3|max:20' ,

        ]);

        $hours = $request->validate([
            'open' => 'integer' ,
            'close' => 'integer'
        ]);



        $restaurant['user_id'] = Auth::id();

        WorkingHour::create($hours);

        $working_hour_id = WorkingHour::latest('created_at')->first()['id'];

        $restaurant['working_hour_id'] = $working_hour_id;

        $restaurant['score_gt'] = 0;


        Restaurant::create($restaurant);
    }



    public function show(Request $request , $id){

        $restaurant = Restaurant::find($id);

        return response()->json(['Information' => $restaurant ]);
    }

    public function index(Request $request){

        $validated = $request->validate([
            'score_gt' => 'nullable|min:1|max:5' ,
            'is_open' => 'nullable' ,
            'type' => 'exists:restaurants,type'
        ]);




        $restaurants = Restaurant::all();

//        if(isset($validated['is_open'])){
//            foreach ($restaurants as $restaurant){
//                if(  $restaurant->working_hour['open'] < Carbon::now() and Carbon::now() < $restaurant->working_hour['close'])
//                    {
//                        $openRestaurants[] = $restaurant;
//                    }
//            }
//        }

        if(isset($validated['score_gt'])){

//            if(isset($openRestaurants)){
//                $openRestaurants = $openRestaurants->where('score_gt' , '>' , $validated['score_gt']);
//            }

           $restaurants =  $restaurants->where('score_gt' , '>' , $validated['score_gt']);
        }

        if(isset($validated['type'])){
//            if(isset($openRestaurants)){
//                $openRestaurants = $openRestaurants->where('type'  , $validated['type']);
//            }

            $restaurants = $restaurants->where('type' , $validated['type']);
        }


        return $restaurants;

    }

    public function foods($id){

        $foods = Restaurant::find($id)->foods;

        return $foods;
    }
}
