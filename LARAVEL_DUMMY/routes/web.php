<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// route sederhana yang mengembalikan string
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

Route::get('/hello-controller', [HelloController::class, 'index']);

// untuk data dummy
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
