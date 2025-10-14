<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #0e7490; color: white; }
        a { text-decoration: none; color: #0e7490; margin: 0 5px; }
        button { background-color: #dc2626; color: white; border: none; padding: 5px 10px; cursor: pointer; }
        button:hover { background-color: #b91c1c; }
    </style>
</head>
<body>
    <h1>📋 Daftar Mahasiswa</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ url('/mahasiswa/create') }}">+ Tambah Mahasiswa</a>

    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        @foreach($mahasiswa as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->prodi }}</td>
            <td>
                <a href="{{ url('/mahasiswa/'.$m->id.'/edit') }}">Edit</a>
                <form action="{{ url('/mahasiswa/'.$m->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
