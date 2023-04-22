<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('register');
})->name('add_user');

Route::post('register',[UserController::class,'store'])->name('store');
Route::get('user_show',[UserController::class,'index'])->name('user_show');
Route::get('user_edit/{id}',[UserController::class,'edit'])->name('user_edit');
Route::get('user_delete/{id}',[UserController::class,'destroy'])->name('user_delete');
Route::post('user_update/{id}',[UserController::class,'update'])->name('user_update');
