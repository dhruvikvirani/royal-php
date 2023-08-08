<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'UnAuth'],function(){
    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'],function(){
    Route::get('/',[AuthorController::class,'index']);
    // Authors
    Route::resource('authors',AuthorController::class);

    // books
    Route::resource('books',BookController::class);

    // profile
    Route::get('/profile',[AuthController::class,'profile'])->name('profile');

    // logout
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});