@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Dosen</h1>

    <p>Selamat datang, {{ auth()->user()->name }}!</p>

    <div class="mt-4">
        <a href="{{ route('fakultas.index') }}" class="btn btn-primary">Kelola Fakultas</a>
        <a href="{{ route('prodi.index') }}" class="btn btn-primary">Kelola Prodi</a>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kelola Mahasiswa</a>
    </div>
</div>
@endsection
