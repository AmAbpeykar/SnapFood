<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AddressController extends Controller
{
    public function store(Request $request){


        

        $address['location'] =   $request->input()['map-input'];
       
        $address['user_id'] = Auth::user()['id'];
        Address::create($address);

        return redirect()->route('home');

        

    }
}
