<?php

//use Illuminate\Http\Request;

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum'); // Passando o middleware inline
Route::get('/me', [AuthApiController::class, 'me'])->middleware('auth:sanctum');  // Passando o middleware inline

Route::middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('/supports', SupportController::class);
});

//Route::apiResource('/supports', SupportController::class);


