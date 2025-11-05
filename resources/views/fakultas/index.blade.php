@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Fakultas</h2>
    <a href="{{ route('fakultas.create') }}" class="btn btn-primary mb-3">+ Tambah Fakultas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $f)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $f->nama_fakultas }}</td>
                <td>
                    <a href="{{ route('fakultas.edit', $f->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus fakultas ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
