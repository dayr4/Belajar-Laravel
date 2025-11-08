@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center py-5" style="min-height: 100vh; background-color: #f5f8fc;">
    <div class="bg-white shadow-lg rounded-4 p-5 w-100" style="max-width: 1700px;">

        <h2 class="fw-bold text-primary mb-4" style="font-size: 2rem;">➕ Tambah Fakultas</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3 fs-6">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fakultas.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="nama_fakultas" class="form-label fw-semibold" style="font-size: 1.1rem;">Nama Fakultas</label>
                <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control form-control-lg shadow-sm"
                    placeholder="Masukkan nama fakultas..." required>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('fakultas.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold" style="border-radius: 10px;">
                    ← Kembali
                </a>
                <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="border-radius: 10px;">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f8fc;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 1.1rem;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        border-color: #3b82f6;
    }

    .btn {
        transition: 0.25s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.05);
    }
</style>
@endsection
