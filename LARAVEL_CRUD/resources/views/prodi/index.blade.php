<h2>Daftar Program Studi</h2>
<a href="{{ route('prodi.create') }}">+ Tambah Prodi</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Prodi</th>
        <th>Fakultas</th>
        <th>Aksi</th>
    </tr>
    @foreach($prodi as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->fakultas->nama_fakultas ?? '-' }}</td>
        <td>
            <a href="{{ route('prodi.edit', $p->id) }}">Edit</a> |
            <form action="{{ route('prodi.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('mahasiswa.index') }}">← Kembali ke Mahasiswa</a>
