<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Halaman awal redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// 🔒 Semua route butuh login & email terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // ===============================
    // DASHBOARD (default Breeze)
    // ===============================
    // Tidak ada redirect otomatis di sini!
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ===============================
    // DASHBOARD DOSEN
    // ===============================
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard-dosen', function () {
            return view('dashboard-dosen');
        })->name('dashboard.dosen');

        // CRUD Mahasiswa (khusus dosen)
        Route::resource('mahasiswa', MahasiswaController::class);
    });

    // ===============================
    //  DASHBOARD MAHASISWA
    // ===============================
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard-mahasiswa', function () {
            return view('dashboard-mahasiswa');
        })->name('dashboard.mahasiswa');

        // Mahasiswa hanya bisa melihat daftar mahasiswa
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
            ->name('mahasiswa.index');
    });

    // ===============================
    //  PROFILE (Breeze)
    // ===============================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
