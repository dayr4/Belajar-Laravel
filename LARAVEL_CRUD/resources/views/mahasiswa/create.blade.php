<h2>Tambah Mahasiswa</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama"><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"></textarea><br>

    <label>Program Studi:</label><br>
    <select name="prodi_id">
        <option value="">-- Pilih Prodi --</option>
        @foreach ($prodi as $p)
            <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->fakultas->nama_fakultas }})</option>
        @endforeach
    </select><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('mahasiswa.index') }}">← Kembali</a>
