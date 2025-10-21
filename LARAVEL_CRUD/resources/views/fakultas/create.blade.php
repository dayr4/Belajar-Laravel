<h2>Tambah Fakultas</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('fakultas.store') }}" method="POST">
    @csrf
    <label>Nama Fakultas:</label><br>
    <input type="text" name="nama_fakultas"><br><br>
    <button type="submit">Simpan</button>
</form>

<a href="{{ route('fakultas.index') }}">← Kembali</a>
