<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaregoryController;
 


Route::get('/', function () {
    return view('welcome');
});


Route::get('/categoryShow',[CaregoryController::class,'index']);

