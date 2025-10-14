<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// route sederhana
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// route pakai controller
Route::get('/hello-controller', [HelloController::class, 'index']);

// route CRUD Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);
