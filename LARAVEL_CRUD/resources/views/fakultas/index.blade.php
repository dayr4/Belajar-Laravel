<h2>Daftar Fakultas</h2>
<a href="{{ route('fakultas.create') }}">+ Tambah Fakultas</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Fakultas</th>
        <th>Aksi</th>
    </tr>
    @foreach($fakultas as $f)
    <tr>
        <td>{{ $f->id }}</td>
        <td>{{ $f->nama_fakultas }}</td>
        <td>
            <a href="{{ route('fakultas.edit', $f->id) }}">Edit</a> |
            <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('mahasiswa.index') }}">← Kembali ke Mahasiswa</a>
