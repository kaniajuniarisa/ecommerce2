<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\CustomerController;

Route::apiResource('customers', CustomerController::class);
Route::get('/api/customers', [CustomerController::class, 'index']);


