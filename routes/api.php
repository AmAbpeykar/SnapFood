<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CartItemController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\AuthController;
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
         Route::get('restaurants' , [RestaurantController::class , 'index']);
         Route::get('/addresses', [AddressController::class, 'index']);
         Route::post('/addresses', [AddressController::class, 'store']);
        Route::get('/carts', [CartController::class, 'index']);

        Route::post('/add', [CartItemController::class, 'add'])->name('order-food');
        Route::get('/carts/{id}', [CartController::class, 'show']);

        Route::put('/update', [CartItemController::class, 'update']);
        Route::post('carts/{id}/pay', [CartController::class, 'pay']);
        Route::get('/comments' , [CommentController::class , 'show']);
        Route::post('/comments/create' , [CommentController::class , 'create']);

        Route::get('logout' , [AuthController::class , 'userLogout']);

    }
);
