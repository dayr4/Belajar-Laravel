@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center"
     style="min-height: 100vh; background: linear-gradient(135deg, #dbeafe, #f1f5f9); padding: 40px;">

    <div class="bg-white shadow-lg rounded-4 p-5 w-100"
         style="max-width: 1200px; border: 1px solid #e2e8f0;">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h2 class="fw-bold text-primary d-flex align-items-center gap-2" style="font-size: 2rem;">
                🏫 Daftar Program Studi
            </h2>
            <a href="{{ route('prodi.create') }}"
               class="btn btn-success px-4 py-2 fw-semibold shadow-sm"
               style="font-size: 1rem; border-radius: 10px;">
               + Tambah Prodi
            </a>
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success fs-5 fw-medium rounded-3 shadow-sm text-center"
                 style="background-color:#dcfce7; border:none; color:#166534;">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="table-responsive mt-4">
            <table class="table align-middle text-center shadow-sm mx-auto"
                   style="font-size: 1.1rem; width: 100%; border-radius: 15px; overflow: hidden;">
                <thead style="background-color: #2563eb; color: white;">
                    <tr>
                        <th style="width: 10%;">NO</th>
                        <th class="text-start ps-4">NAMA PRODI</th>
                        <th class="text-start ps-4">FAKULTAS</th>
                        <th style="width: 25%;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prodi as $p)
                        <tr style="background-color: #f9fafb;">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start ps-4">{{ $p->nama }}</td>
                            <td>{{ $p->fakultas->nama_fakultas ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2 flex-nowrap">
                                    <a href="{{ route('prodi.edit', $p->id) }}" 
                                    class="btn fw-semibold text-white"
                                    style="background-color: #f59e0b; border:none; border-radius:8px; padding:6px 18px;">
                                    ✏️ Edit
                                    </a>
                                    <form action="{{ route('prodi.destroy', $p->id) }}" 
                                        method="POST" class="d-inline m-0 p-0"
                                        onsubmit="return confirm('Yakin ingin menghapus prodi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn fw-semibold text-white"
                                                style="background-color: #ef4444; border:none; border-radius:8px; padding:6px 18px;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-muted fs-5 bg-light text-center">
                                <em>Belum ada program studi yang tersedia.</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- Styling tambahan --}}
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #dbeafe, #f1f5f9);
    }

    table thead th {
        text-transform: uppercase;
        letter-spacing: 0.7px;
    }

    table tbody tr:hover {
        background-color: #e0f2fe !important;
        transition: 0.3s;
    }

    .btn {
        transition: 0.25s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.05);
        filter: brightness(1.1);
    }

    td div {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
        gap: 10px !important;
    }

    .table {
        width: 100%;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        vertical-align: middle !important;
    }
</style>
@endsection
