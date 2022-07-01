<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;

use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function create()
    {
        return view('Admin.new-restaurant-category');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'min:3|max:20',
            'restaurant_category_id' => 'exists:restaurants_categories'
        ]);

        RestaurantCategory::create($validated);

        return redirect()->route('admin.panel');
    }




    public function edit($id)
    {
        return view('Admin.edit-restaurant-category' , ['id' => $id]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'restaurant_category_id' => 'exists:restaurants_categories',
            'name' => 'min:3|max:20'
        ]);


        RestaurantCategory::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');
    }


    public function destroy($id)
    {
        RestaurantCategory::where('id' , $id)->delete();

        return redirect()->route('admin.panel');
    }
}
