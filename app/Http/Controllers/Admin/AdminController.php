<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Offer;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $admin = Auth::user();

        $food_cat = FoodCategory::all();

        $rest_cat = RestaurantCategory::all();

        $offers = Offer::all();

        $banners = Banner::all();

        return view('Admin.admin-panel' , ['admin' => $admin , 'food_cat' => $food_cat , 'rest_cat' => $rest_cat , 'offers' => $offers , 'banners' => $banners]);
    }
    public function indexSell($id)
    {

        $seller = Auth::user();
        $foods = Food::all();

        return view('Seller.seller-panel' , ['seller' => $seller , 'foods' => $foods] );


    }

    public function create()
    {
        return view('Seller.create-food');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image' ,
            'name' => 'min:3|max:20' ,
            'price' => 'min:10000|max:300000',
            'food_party' => 'boolean',
            'offer' => 'exists:offers'
        ]);

//        Storage::put('image' , $validated['image']);

        $newImageName = time() . '-' . $validated['name'] . '.' . $validated['image']->extension();

        $validated['image']->move(public_path('images') , $newImageName);

        Food::create($validated);


        return redirect()->route('seller.panel');
    }

    public function edit($id)
    {
        return view('Seller.edit-food');
    }

    public function update(Request $request , $id)
    {
        $validated = $request->validate([
            'image' => 'image' ,
            'name' => 'min:3|max:20' ,
            'price' => 'min:10000|max:300000',
            'food_party' => 'boolean',
            'offer' => 'exists:offers'
        ]);

        Food::where('id' , $id)->update($validated);

        return redirect()->route('seller.panel');

    }
}
