@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5 text-primary mb-3">Dashboard Dosen</h1>
        <p class="fs-5 text-secondary">
            Selamat datang, <strong class="text-dark">{{ Auth::user()->name }}</strong> 👋
        </p>
    </div>

    <div class="row justify-content-center g-4">
        <!-- Kelola Fakultas -->
        <div class="col-md-4">
            <a href="{{ route('fakultas.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-shadow">
                    <div class="fs-1 mb-3">🏫</div>
                    <h5 class="fw-bold text-dark mb-2">Kelola Fakultas</h5>
                    <p class="text-muted">Tambah, ubah, atau hapus data fakultas.</p>
                </div>
            </a>
        </div>

        <!-- Kelola Prodi -->
        <div class="col-md-4">
            <a href="{{ route('prodi.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-shadow">
                    <div class="fs-1 mb-3">📚</div>
                    <h5 class="fw-bold text-dark mb-2">Kelola Program Studi</h5>
                    <p class="text-muted">Atur program studi sesuai fakultasnya.</p>
                </div>
            </a>
        </div>

        <!-- Kelola Mahasiswa -->
        <div class="col-md-4">
            <a href="{{ route('mahasiswa.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-shadow">
                    <div class="fs-1 mb-3">🎓</div>
                    <h5 class="fw-bold text-dark mb-2">Kelola Mahasiswa</h5>
                    <p class="text-muted">Lihat dan kelola data mahasiswa aktif.</p>
                </div>
            </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger px-4 py-2 fs-5">Logout</button>
        </form>
    </div>
</div>

<style>
    /* Sedikit efek hover biar manis */
    .hover-shadow:hover {
        transform: translateY(-5px);
        transition: all 0.2s ease-in-out;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
</style>
@endsection
