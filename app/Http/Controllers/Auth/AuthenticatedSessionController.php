<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi kredensial user
        $request->authenticate();

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // Ambil data user yang login
        $user = Auth::user();

        // 🔥 Redirect berdasarkan role
        if ($user->role === 'dosen') {
            return redirect()->route('dashboard.dosen')->with('success', 'Selamat datang, Dosen!');
        }

        if ($user->role === 'mahasiswa') {
            return redirect()->route('dashboard.mahasiswa')->with('success', 'Selamat datang, Mahasiswa!');
        }

        // Jika tidak punya role yang dikenali
        return redirect()->route('dashboard')->with('warning', 'Role tidak dikenali, dialihkan ke dashboard utama.');
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Anda telah logout.');
    }
}
