<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FoodController;
use App\Models\Food;
use App\Models\Food_Offer;
use App\Models\Food_Order;
use App\Models\FoodCategory;
use App\Models\Offer;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Auth::user();

        $restaurants = Restaurant::where('user_id', Auth::id())->paginate(10);

        return view('Seller.seller-panel', ['seller' => $seller, 'restaurants' => $restaurants]);
    }



    public function create($id)
    {



        $offers = Offer::all(['percent', 'id']);
        $categories = FoodCategory::all(['name', 'id']);

        return view('Seller.create-food', ['id' => $id, 'offers' => $offers, 'categories' => $categories]);
    }



    public function store(Request $request)
    {


        $input = $request->input();




        $offer = $input['offer_id'];





        unset($input['offer_id']);

        $food = $input;


        FoodController::store($food);


        $id = Food::latest()->first()['id'];



        $offer = ['food_id' => $id, 'offer_id' => $offer];

        Food_Offer::create($offer);


        return redirect()->route('seller.panel');
    }



    public function editFoodPage($id)
    {

        $food = Food::find($id);
        $categories = FoodCategory::all(['name', 'id']);
        $offers = Offer::all(['percent', 'id']);



        return view('Seller.edit-food-page', ['id' => $id, 'food' => $food, 'categories' => $categories, 'offers' => $offers]);
    }

    public function deleteFood($id, Request $request)
    {

        FoodController::delete($id);

        return redirect()->route('seller.panel', [$id => Auth::id()]);
    }

    public function update($id, Request $request)
    {

        $input = $request->input();

        unset($input['_token']);
        unset($input['_method']);



      

        $validated = $request->validate([
            'name' => 'required|min:3|max:20',
            'food_category_id' => 'required|exists:foods_categories',
            'price' => 'required|integer',
            'image' => 'file|image|dimensions:max_with=500,max_height=500',
        ]);

        if($request->input()['offer_id'] !== 'null'){
            $food_offer = Food_Offer::where('food_id' , $id)->first();
            if(!empty($food_offer)){
            $food_offer->update(['offer_id' => $request->input()['offer_id']]);

        }else{       
            Food_Offer::create(['offer_id' => $request->input()['offer_id'] , 'food_id' => $id]);
        }
        }





        $image = time() . '_' . $validated['name'] . '.' . $request->file('image')->extension();

        $request->image->move(public_path('images'), $image);


        $validated['image'] = $image;
        FoodController::update($id, $validated);

        return redirect()->route('seller.panel');
    }
}
