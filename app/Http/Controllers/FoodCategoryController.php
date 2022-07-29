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
            'food_category_id' => 'nullable|exists:foods_categories'
            ]);

        if(!isset($validated['food_category_id'])){
            $validated['food_category_id'] = 0;
        }

        FoodCategory::create($validated);

        return redirect()->route('admin.panel');
    }




    public function edit($id)
    {

        $category = FoodCategory::where('id' , $id)->first();

        return view('Admin.edit-food-category' , ['id' => $id , 'category' => $category]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'food_category_id' => 'nullable|exists:foods_categories',
           'name' => 'min:3|max:20'
        ]);

       if(!isset($validated['food_category_id'])){
           $validated['food_category_id'] = 0;
       }

        FoodCategory::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');
    }


    public function destroy($id)
    {
        FoodCategory::where('id' , $id)->delete();

        return redirect()->route('admin.panel');
    }
}
