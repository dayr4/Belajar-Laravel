<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-controller', [HelloController::class, 'index']);

/* ===========================================================
 |   PAKAI SALAH SATU:
 |  - Untuk Dummy, aktifkan route di bawah ini
 |  - Untuk CRUD Database, aktifkan yang Route::resource()
 =========================================================== */

// Versi Dummy
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
// Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
// Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
// Route::post('/mahasiswa/{id}', [MahasiswaController::class, 'update']);

// Versi Database (CRUD)

Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
