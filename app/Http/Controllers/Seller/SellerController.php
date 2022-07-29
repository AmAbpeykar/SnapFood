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



        $food = $request->validate([
            'name' => 'min:3|max:20' ,
            'price' => 'integer' ,
            'quantity' => 'integer' ,
            'food_category_id' => 'exists:foods_categories,id' ,
            'image' => 'nullable|image' ,
            'restaurant_id' => 'exists:restaurants,id'
        ]);


        $food['in_food_party'] = false;

        $offer = $request->validate([
            'offer_id' => 'nullable|exists:offers,id'
        ]);



        if(isset($food['image'])){

            $image = time() . '_' . $food['name'] . '.' . $request->file('image')->extension();

            $request->image->move(public_path('images'), $image);

            $food['image'] = $image;
        }

        FoodController::store($food);




        $id = Food::latest()->first()['id'];


        $offer['food_id'] = $id;




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


        $food = $request->validate([
            'name' => 'required|min:3|max:20',
            'food_category_id' => 'required|exists:foods_categories,id',
            'price' => 'required|integer',
            'image' => 'nullable|file|image|dimensions:max_with=500,max_height=500',
            'delete_image' => Rule::in(['on' , null])
        ]);


        $offer = $request->validate([
            'offer_id' => 'nullable|exists:offers,id'
        ]);

       if(isset($food['delete_image'])){
            $food['image'] = null;
            unset($food['delete_image']);
       }



        if(isset($food['image'])){

            $image = time() . '_' . $food['name'] . '.' . $request->file('image')->extension();

            $request->image->move(public_path('images'), $image);

            $food['image'] = $image;
        }

        if(!is_null($offer['offer_id'])){

            Food_Offer::where('food_id' , $id)->delete();

            $offer['food_id'] = $id;

            Food_Offer::create($offer);

        }

        FoodController::update($id, $food);

        return redirect()->route('seller.panel');
    }
}
