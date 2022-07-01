<?php

namespace App\Http\Controllers;


use App\models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create()
    {
        return view('Admin.new-offer');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'Percent' => 'required',
            'expiredtime' => 'date',
            'food_id' => 'integer' ,
        ]);

        Offer::create($validated);

        return redirect()->route('admin.panel');
    }




    public function edit($id)
    {
        return view('Admin.edit-offer' , ['id' => $id]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Percent' => 'required',
            'expiredtime' => 'date',
            'food_id' => 'integer'
        ]);

        Offer::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');
    }


    public function destroy($id)
    {
        Offer::where('id' , $id)->delete();

        return redirect()->route('admin.panel');
    }
}
