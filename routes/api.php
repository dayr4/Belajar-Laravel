<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\MahasiswaController;

Route::get('/test', function () {
    return response()->json(['message' => 'API route works!']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::apiResource('mahasiswa', MahasiswaController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
