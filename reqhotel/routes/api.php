<?php

use App\Http\Controllers\API\ReqhotelController;
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

Route::get('reqhotel', [ReqhotelController::class, 'index']);
Route::post('reqhotel/store', [ReqhotelController::class, 'store']);
Route::get('reqhotel/show/{id}', [ReqhotelController::class, 'show']);
Route::post('reqhotel/update/{id}', [ReqhotelController::class, 'update']);
Route::get('reqhotel/destroy/{id}', [ReqhotelController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
