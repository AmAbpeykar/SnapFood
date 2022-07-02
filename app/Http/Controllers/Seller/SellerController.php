<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FoodController;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Offer;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Auth::user();

        $restaurants = Restaurant::all()->where('user_id' , Auth::id());

       return view('Seller.seller-panel' , ['seller' => $seller , 'restaurants' => $restaurants]);
    }

    public function editFoodPage($id)
    {

        $food = Food::find($id);
        $categories = FoodCategory::all(['name' , 'id']);
        $offers = Offer::all(['percent' , 'id' ]);



        return view('Seller.edit-food-page' , ['id' => $id , 'food' => $food, 'categories' => $categories , 'offers' => $offers]);

    }

    public function deleteFood($id , Request $request)
    {

        FoodController::delete($id);

        return redirect()->route('seller.panel' , [$id => Auth::id()]);
    }

    public function update($id , Request $request)
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


        $image = time() . '_' . $validated['name'] . '.' . $request->file('image')->extension() ;

        $request->image->move(public_path('images') , $image);


        $validated['image'] = $image;
         FoodController::update($id , $validated);

         return redirect()->route('seller.panel');
    }

}
