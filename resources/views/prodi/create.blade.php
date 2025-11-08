@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Prodi</h2>
    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="fakultas_id" class="form-label">Pilih Fakultas</label>
            <select class="form-select" id="fakultas_id" name="fakultas_id" required>
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
