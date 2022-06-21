<?php

use App\Http\Controllers\API\TransportasiController;
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

Route::get('transportasi', [TransportasiController::class ,'index']);
Route::post('transportasi/store', [TransportasiController::class ,'store']);
Route::get('transportasi/show/{id}', [TransportasiController::class ,'show']);
Route::post('transportasi/update/{id}', [TransportasiController::class ,'update']);
Route::get('transportasi/destroy/{id}', [TransportasiController::class ,'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
