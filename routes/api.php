<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\API\APIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user_list',[APIController::class,'index'])->name('user_list');
Route::post('user_insert',[APIController::class,'store'])->name('user_insert');
Route::post('date_filter',[APIController::class,'date_filter'])->name('date_filter');


Route::get('show_user/{id}',[APIController::class,'show'])->name('show_user');
Route::delete('user_delete_api/{id}',[APIController::class,'destroy'])->name('user_delete_api');
Route::patch('user_update_api/{id}',[APIController::class,'update'])->name('user_update_api');

