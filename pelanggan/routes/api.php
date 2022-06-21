<?php

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

Route::get('pelanggans', [PelangganController::class, 'index']);
Route::post('pelanggans/store', [PelangganController::class, 'store']);
Route::get('pelanggans/show/{id}', [PelangganController::class, 'show']);
Route::post('pelanggans/update/{id}', [PelangganController::class, 'update']);
Route::get('pelanggans/destroy/{id}', [PelangganController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
