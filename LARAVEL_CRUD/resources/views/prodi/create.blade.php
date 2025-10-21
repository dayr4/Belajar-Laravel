<h2>Tambah Prodi</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('prodi.store') }}" method="POST">
    @csrf
    <label>Nama Prodi:</label><br>
    <input type="text" name="nama"><br>

    <label>Fakultas:</label><br>
    <select name="fakultas_id">
        <option value="">-- Pilih Fakultas --</option>
        @foreach ($fakultas as $f)
            <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('prodi.index') }}">← Kembali</a>
