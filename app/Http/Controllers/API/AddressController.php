<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(){
        return response()->json(Address::all());
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|string',
            'user_id' => 'required|integer',
            'latitude' => 'required|integer',
            'longitude' => 'required|integer',
            'address' => 'required|string'
        ]);
        
        Address::create($validated);


        return 'created successfully';


    }

}
