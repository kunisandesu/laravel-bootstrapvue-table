<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;

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


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/users', [UserController::class, 'users']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/usergp1s', [UserController::class, 'usergp1s']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/usergp2s', [UserController::class, 'usergp2s']);
});



Route::middleware('auth:sanctum')->group(function(){
    Route::get('/userfinalgp1s', [UserController::class, 'userfinalgp1s']);
});


