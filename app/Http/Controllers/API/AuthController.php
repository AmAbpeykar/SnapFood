<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
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


    /**
     * @throws ValidationException
     */
    public function userLogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;

    }

    public function userLogout(){

        auth()->user()->tokens()->delete();

        return [
            'message' => 'logged out'
        ];

    }
}
