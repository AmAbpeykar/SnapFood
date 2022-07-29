<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $banners = Banner::all();

        $foods = Food::paginate(8);

        return view('home' , ['banners' => $banners , 'foods' => $foods]);

    }
}
