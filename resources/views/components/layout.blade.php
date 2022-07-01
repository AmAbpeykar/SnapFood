@php
use \Illuminate\Support\Facades\Auth;
if(Auth::user()){
$role = \App\Models\Role::where('id' ,Auth::user()->role_id)->first();
$role = $role['role'];
}
    @endphp
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

    <navbar class="flex bg-rose-600 content-center align-middle text-white justify-evenly p-8">

        @if(Auth::guest())
        <a class="border-2 border-white px-5 py-1 hover:px-7 duration-700" href=" {{ route('login.show') }} ">Login</a>
        <a class="border-2 border-white px-5 py-1 hover:px-7 duration-700" href=" {{route('register.show')}}">Register</a>
        @endif
        @if(Auth::check())
        <a class="border-2 border-white px-5 py-1 hover:px-7 duration-700" href=" {{ route('logout') }}">Logout</a>
        <a class="border-2 border-white px-5 py-1 hover:px-7 duration-700" href=" {{ route($role . '.panel' , ['id' => Auth::id()]) }} ">Your Panel</a>
        @endif
    </navbar>

    {{$slot}}


    </body>

    </html>

