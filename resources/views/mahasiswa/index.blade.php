@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">Daftar Mahasiswa</h3>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success mb-3">+ Tambah Mahasiswa</a>

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
                    <th width="150">Aksi</th>
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
                        <td>
                            <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mahasiswa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
