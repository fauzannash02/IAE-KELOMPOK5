<?php

use App\Http\Controllers\API\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('hotel/update/{id}',[HotelController::class, 'update']);
Route::get('hotel/destroy/{id}',[HotelController::class, 'destroy']);
Route::get('hotel/show/{id}',[HotelController::class, 'show']);
Route::get('hotel',[HotelController::class,'index']);
Route::post('hotel/store',[HotelController::class,'store']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
