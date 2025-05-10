<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\CustomerController;

Route::get('/admin/produk', [CustomerController::class, 'adminIndex']);
Route::get('/admin/produk/create', [CustomerController::class, 'create']);
Route::post('/admin/produk', [CustomerController::class, 'store']);
Route::get('/admin/produk/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/admin/produk/{id}', [CustomerController::class, 'update']);
Route::delete('/admin/produk/{id}', [CustomerController::class, 'destroy']);
Route::get('/produk/{id}', [CustomerController::class, 'show'])->name('produk.show');
Route::get('/kategori/{kategori}', [CustomerController::class, 'kategori'])->name('produk.kategori');




