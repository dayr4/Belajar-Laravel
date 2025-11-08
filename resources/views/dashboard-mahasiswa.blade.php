@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Mahasiswa</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            📋 Daftar Mahasiswa
        </div>
        <div class="card-body">
            @if($mahasiswa->isEmpty())
                <p class="text-muted">Belum ada data mahasiswa.</p>
            @else
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $m)
                            <tr>
                                <td>{{ $m->nim }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->alamat ?? '-' }}</td>
                                <td>{{ $m->prodi->nama ?? '-' }}</td>
                                <td>{{ $m->prodi->fakultas->nama ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="mt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection
