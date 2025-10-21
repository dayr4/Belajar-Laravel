<h2>Daftar Mahasiswa</h2>
<a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Prodi</th>
        <th>Fakultas</th>
        <th>Aksi</th>
    </tr>
    @foreach($mahasiswa as $m)
    <tr>
        <td>{{ $m->nim }}</td>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->alamat }}</td>
        <td>{{ $m->prodi->nama ?? '-' }}</td>
        <td>{{ $m->prodi->fakultas->nama_fakultas ?? '-' }}</td>
        <td>
            <a href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a> |
            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
