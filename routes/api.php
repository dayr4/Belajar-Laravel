<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MahasiswaController;

Route::get('/test', fn() => response()->json(['message' => 'API route works!']));

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', fn(Request $request) => response()->json($request->user()));

    // hanya dosen (admin) yang boleh kelola data mahasiswa
    Route::middleware('admin')->group(function () {
        Route::apiResource('mahasiswa', MahasiswaController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
