<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::post("auth/login", [AuthController::class, "login"]);        
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix("orders")->group(function () {
        Route::get('/kpis', [OrderController::class, "getKpis"]);
        Route::get('/', [OrderController::class, "index"]);
        Route::get('/{order}', [OrderController::class, "getOrderDetail"]);
    });
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
