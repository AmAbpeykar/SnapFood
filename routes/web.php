<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Seller\SellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Group Middleware

Route::group(['middleware' => 'auth'], function (){
    // Admin Panel
   Route::group([
      'prefix' => 'panel',
       'middleware' => 'admin',
       'as' => 'admin.'
   ] , function (){
       Route::get('admin' , [AdminController::class , 'index'])
           ->name('panel');
   });
    // User Panel
    Route::group([
        'prefix' => 'panel',
        'as' => 'user.'
    ] , function (){
        Route::get('user/{id}' , [UserController::class , 'index'])
            ->name('panel');
    });

    Route::group([
       'prefix' => 'panel',
       'middleware' => 'seller',
       'as' => 'seller.',] ,
        function(){
        Route::get('seller/{id?}' , [SellerController::class , 'index'])
            ->name('panel');
        });

});



Route::get('register' , [AuthController::class , 'registerPage'])->name('register.show')->middleware('guest');

Route::get('login' , [AuthController::class , 'loginPage'])->name('login.show')->middleware('guest');

Route::post('register' , [AuthController::class , 'register'])->name('register');

Route::post('login' , [AuthController::class , 'login'])->name('login');

Route::get('user-panel/{id}' , [UserController::class , 'userPanel'])->name('user-panel');

Route::get('admin-panel/{id}' , [UserController::class , 'adminPanel'])->name('-panel')->middleware('admin' , 'auth');

Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');

Route::get('/home' , function (){
   return view('home');
})->name('home');

Route::get('/admin-panel/food-categories' , []);

Route::get('/panel/admin/store' , [FoodCategoryController::class , 'create'])->name('new_food_category');

Route::post('/panel/admin/store' , [FoodCategoryController::class , 'store'])->name('create_food_category');

Route::delete('/panel/admin/destroy/{id}' , [FoodCategoryController::class , 'destroy'])->name('delete_food_category');

Route::get('/panel/admin/edit/{id}' , [FoodCategoryController::class , 'edit'])->name('edit-food-category');
Route::put('/panel/admin/update/{id}' , [FoodCategoryController::class , 'update'])->name('update-food-category');


Route::get('/panel/admin/restaurant/store' , [RestaurantCategoryController::class , 'create'])->name('new_restaurant_category');

Route::post('/panel/admin/restaurant/store' , [RestaurantCategoryController::class , 'store'])->name('create_restaurant_category');

Route::delete('/panel/admin/restaurant/destroy/{id}' , [RestaurantCategoryController::class , 'destroy'])->name('delete_restaurant_category');

Route::get('/panel/admin/restaurant/edit/{id}' , [RestaurantCategoryController::class , 'edit'])->name('edit-restaurant-category');
Route::put('/panel/admin/restaurant/update/{id}' , [RestaurantCategoryController::class , 'update'])->name('update-restaurant-category');


Route::get('/panel/admin/offer/store' , [OfferController::class , 'create'])->name('new-offer');

Route::post('/panel/admin/offer/store' , [OfferController::class , 'store'])->name('create_offer');

Route::delete('/panel/admin/offer/destroy/{id}' , [OfferController::class , 'destroy'])->name('delete_offer');

Route::get('/panel/admin/offer/edit/{id}' , [OfferController::class , 'edit'])->name('edit-offer');
Route::put('/panel/admin/offer/update/{id}' , [OfferController::class , 'update'])->name('update-offer');

//Route::get('/');

Route::get('/panel/seller/add-food' , [SellerController::class , 'create' ])->name('create-food');

Route::put('/panel/seller/update/{id}' , [SellerController::class , 'update'])->name('update-food');


Route::get('/panel/seller/edit-food/{id}' , [SellerController::class , 'editFoodPage' ])->name('edit-food-page');
Route::delete('/panel/seller/delete-food/{id}' , [SellerController::class , 'deleteFood'])->name('delete-food');
