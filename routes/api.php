<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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


Route::group(['prefix'=>'users','namespace'=>'Api'], function (){

    Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('logout',[AuthController::class,'logout']);

    //start user data update and get and delete
    Route::get('all',[UserController::class,'index']);
    Route::get('show/{id}',[UserController::class,'show']);
    Route::put('update/{id}',[UserController::class,'update']);
    Route::delete('delete/{id}',[UserController::class,'delete']);
});
