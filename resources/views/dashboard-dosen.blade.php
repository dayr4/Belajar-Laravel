@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Dosen</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>

    <div class="list-group mt-4">
        <a href="{{ route('fakultas.index') }}" class="list-group-item list-group-item-action">
            📚 Kelola Fakultas
        </a>
        <a href="{{ route('prodi.index') }}" class="list-group-item list-group-item-action">
            🏫 Kelola Program Studi
        </a>
        <a href="{{ route('mahasiswa.index') }}" class="list-group-item list-group-item-action">
            🎓 Kelola Mahasiswa
        </a>
    </div>

    <div class="mt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection
