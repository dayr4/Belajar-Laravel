@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Fakultas</h2>

    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" value="{{ $fakultas->nama_fakultas }}" required>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
