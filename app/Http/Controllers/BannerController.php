<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function destroy($id)
    {
        Banner::where('id' , $id)->delete();

        return redirect()->route('admin.panel');
    }

    public function edit($id)
    {
       $banner = Banner::where('id' , $id)->first();

        return view('Admin.edit-banner' , [
            'banner' => $banner
        ]);
    }

    public function update(Request $request ,$id)
    {


        // Image Validation : dimensions:max_with=500,max_height=500
        $validated = $request->validate([
            'image' => 'nullable|file|image' ,
            'name' => 'min:3|max:20'
        ]);

        if(isset($validated['image'])){

            $image = time() . '_' . $validated['name'] . '.' . $request->file('image')->extension();

            $request->image->move(public_path('images'), $image);

            $validated['image_path'] = $image;
        }

        unset($validated['image']);


        Banner::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');

    }

    public function create()
    {

        return view('Admin.create-banner');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|file|image' ,
            'name' => 'min:3|max:20'
        ]);

        if(isset($validated['image'])){

            $image = time() . '_' . $validated['name'] . '.' . $request->file('image')->extension();

            $request->image->move(public_path('images'), $image);

            $validated['image_path'] = $image;
        }

        unset($validated['image']);


        Banner::create($validated);

        return redirect()->route('admin.panel');
    }
}
