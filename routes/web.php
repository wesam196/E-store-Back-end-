<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaregoryController;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('welcome');
});



Route::post('/addCategory',[CaregoryController::class,'store']);


Route::post('/login',[AuthController::class,'login']);

//Route::post('/logout',[AuthController::class,'logout']);
// routes/api.php
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');
