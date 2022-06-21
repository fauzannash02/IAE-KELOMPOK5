<?php

use App\Http\Controllers\API\tiket_transportasi_controller;
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

Route::get('tiket_transportasi', [tiket_transportasi_controller::class, 'index']);
Route::post('tiket_transportasi/store', [tiket_transportasi_controller::class, 'store']);
Route::get('tiket_transportasi/show/{id}', [tiket_transportasi_controller::class, 'show']);
Route::post('tiket_transportasi/update/{id}', [tiket_transportasi_controller::class, 'update']);
Route::get('tiket_transportasi/destroy/{id}', [tiket_transportasi_controller::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
