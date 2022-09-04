<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function(){
    // 要ユーザ認証
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::middleware('verified')->group(function(){
        // 要メール認証
        //Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    });
});


require __DIR__.'/auth.php';


Route::get('/user', function () {
    return view('user');
});

