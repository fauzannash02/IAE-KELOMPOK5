<?php

use App\Http\Controllers\API\TiketController;
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

Route::get('tiket-app', [TiketController::class, 'index']);
Route::post('tiket-app/store', [TiketController::class, 'store']);
Route::get('tiket-app/show/{id}', [TiketController::class, 'show']);
Route::post('tiket-app/update/{id}', [TiketController::class, 'update']);
Route::get('tiket-app/destroy/{id}', [TiketController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
