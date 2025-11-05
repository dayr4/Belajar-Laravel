@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Prodi</h2>

    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas_id" class="form-control" required>
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
