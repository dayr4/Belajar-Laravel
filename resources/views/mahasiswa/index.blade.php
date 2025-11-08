@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">Daftar Mahasiswa</h3>

        {{-- Tombol tambah hanya muncul untuk dosen --}}
        @if(auth()->user()->role === 'dosen')
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success mb-3">+ Tambah Mahasiswa</a>
        @endif

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    @if(auth()->user()->role === 'dosen')
                        <th width="150">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->prodi->nama ?? '-' }}</td>
                        <td>{{ $m->prodi->fakultas->nama_fakultas ?? '-' }}</td>

                        {{-- Aksi edit & hapus hanya untuk dosen --}}
                        @if(auth()->user()->role === 'dosen')
                        <td>
                            <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mahasiswa ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
