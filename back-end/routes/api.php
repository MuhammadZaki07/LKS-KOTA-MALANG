<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\AdminMidlleware;
use App\Http\Middleware\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user',[AuthController::class,'getUser']);
Route::post('/user',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware(['auth:sanctum',AdminMidlleware::class])->group(function () {
    Route::post('/cities/{provinsiId}',[CityController::class,'store']);
    Route::post('/logout/admin',[AuthController::class,'logout']);
    Route::get('/user',[UserController::class,'index']);
});

Route::middleware(['auth:sanctum',UserRegister::class])->group(function () {
    Route::post('/logout/user',[AuthController::class,'logout']);
});
