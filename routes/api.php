<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register', [AuthController::class, 'userRegister']);

Route::post('login', [AuthController::class, 'userLogin']);

Route::group(
    ['middleware' => 'auth:sanctum'],
    function () {
        Route::get('restaurants/{id}/foods' , [RestaurantController::class , 'foods']);
        Route::get('restaurants/{id}', [RestaurantController::class, 'show']);
        Route::get('restaurants/{is_open?}/{type?}/{score_gt?}' , [RestaurantController::class , 'index']);
        Route::get('/addresses', [AddressController::class, 'index']);
        Route::post('/addresses', [AddressController::class, 'store']);
    }
);
