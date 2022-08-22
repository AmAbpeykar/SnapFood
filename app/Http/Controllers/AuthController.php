<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Banner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function loginPage()
    {
        $banner = Banner::where('name' , 'login_banner')->first();

        return view('login' , ['banner' => $banner]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'role_id' => Rule::in(['1' , '2' , '3']),
            'password' => 'confirmed|min:3|max:20',
            'email' => 'unique:users|email',
            'name' => 'min:3|max:20',
        ]);

        User::create($validated);

        Mail::to($validated['email'])->send(new WelcomeMail());

        Auth::attempt($validated);

        return redirect()->route('home');

    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'exists:users',
            'password' => 'min:3|max:20',
            'role_id' => Rule::in([1 , 2 , 3])
        ]);

        if (Auth::attempt($validated)){



            $role = Auth::user()->role->role;

            if($role == 'user'){
                return redirect()->route('user.panel' );
            }

            return redirect( )->route( $role  . '.panel');

        }

        return redirect()->route('login');

    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('home');

    }
}
