<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{


    public function create()
    {
        return view('Admin.new_food_category');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'min:3|max:20',
            'food_category_id' => 'exists:foods_categories'
            ]);

        FoodCategory::create($validated);

        return redirect()->route('admin.panel');
    }




    public function edit($id)
    {
        return view('Admin.edit-food-category' , ['id' => $id]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'food_category_id' => 'exists:foods_categories',
           'name' => 'min:3|max:20'
        ]);

        FoodCategory::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');
    }


    public function destroy($id)
    {
        FoodCategory::where('id' , $id)->delete();

        return redirect()->route('admin.panel');
    }
}
