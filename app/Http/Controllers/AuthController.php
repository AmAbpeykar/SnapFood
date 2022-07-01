<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function loginPage()
    {
        return view('login');
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
                return route('users/api');
            }

            return redirect( )->route( $role  . '.panel' , ['id' => Auth::id()]);

        }

        return redirect()->route('login');

    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('home');

    }

    public function userRegister(Request $request){
        $validated = $request->validate([
            'email' => 'unique:users,email|required',
            'name' => 'required|min:3|max:20',
            'password' => 'required',
    
        ]);
        
        $validated['password'] = bcrypt($validated['password']);
        $validated['role_id'] = Role::IS_USER;


        $user = User::create($validated);
        
        $token =$user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user ,
            'token' => $token
        ];
        
        return response($response , 201);
    }

}
