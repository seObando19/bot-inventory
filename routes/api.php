<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DialogflowController;
/* use App\Http\Controllers\UserController; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:sanctum')->get('/user',  function(Request $request){
    return $request->user();
});

Route::get('/users', [UserController::class, 'users']);
Route::get('/login', [UserController::class, 'login']); */

Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);

Route::post('/webhook', [DialogflowController::class, 'handleRequest']);
