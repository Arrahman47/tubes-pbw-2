<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::prefix('payments')->group(function () {
    Route::post('/', [PaymentController::class, 'store']); // Simpan pembayaran
    Route::get('/', [PaymentController::class, 'index']);  // Ambil semua pembayaran
    Route::get('/{id}', [PaymentController::class, 'show']); // Ambil pembayaran by ID
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
