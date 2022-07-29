<?php

namespace App\Http\Controllers;


use App\Models\Food_Offer;
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
            'Percent' => 'required|numeric|min:1|max:99',
            'expiredtime' => 'date',
        ]);

        Offer::create($validated);

        return redirect()->route('admin.panel');
    }




    public function edit($id)
    {

        $offer = Offer::where('id' , $id)->first();

        return view('Admin.edit-offer' , ['id' => $id , 'offer' => $offer]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Percent' => 'required|numeric|min:1|max:99',
            'expiredtime' => 'date',
        ]);

        Offer::where('id' , $id)->update($validated);

        return redirect()->route('admin.panel');
    }


    public function destroy($id)
    {
        Offer::where('id' , $id)->delete();

        Food_Offer::where('offer_id' , $id)->delete();

        return redirect()->route('admin.panel');
    }
}
