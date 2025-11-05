@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Prodi</h2>

    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="nama" class="form-control" value="{{ $prodi->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas_id" class="form-control" required>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
