<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CaregoryController;
use App\Http\Controllers\products;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('logout',[AuthController::class,'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/users',UserController::class);

    Route::post('/addcategory',[CaregoryController::class,'store']);
    Route::post('/updateCategory/{id}',[CaregoryController::class,'update']);
    Route::post('/deleteCategory/{id}',[CaregoryController::class,'delete']);

    Route::post('/addProduct',[CaregoryController::class,'store']);
    Route::post('/updateProduct/{id}',[CaregoryController::class,'update']);
    Route::post('/deleteProduct/{id}',[CaregoryController::class,'delete']);
});



Route::post('login',[AuthController::class,'login']);
Route::POST('register',[AuthController::class,'register']);

Route::get('/categoryShow/{id}',[CaregoryController::class,'show']);
Route::get('/categoryShow',[CaregoryController::class,'index']);

Route::get('/productShow/{id}',[CaregoryController::class,'show']);
Route::get('/productShow',[CaregoryController::class,'index']);


