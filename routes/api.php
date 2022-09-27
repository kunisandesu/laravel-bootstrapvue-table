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
    Route::patch('/update', [UserController::class, 'update']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateThigh', [UserController::class, 'updateThigh']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateLower', [UserController::class, 'updateLower']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateMiddle', [UserController::class, 'updateMiddle']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateThighM', [UserController::class, 'updateThighM']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateLowerM', [UserController::class, 'updateLowerM']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateSenior', [UserController::class, 'updateSenior']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateThighS', [UserController::class, 'updateThighS']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateLowerS', [UserController::class, 'updateLowerS']);
});


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/users', [UserController::class, 'users']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/usersearches', [UserController::class, 'usersearches']);
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


