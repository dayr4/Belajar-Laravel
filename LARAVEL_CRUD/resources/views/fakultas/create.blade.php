@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Fakultas</h2>

    <form action="{{ route('fakultas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
