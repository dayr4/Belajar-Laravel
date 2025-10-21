<h2>Edit Prodi</h2>

<form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Prodi:</label><br>
    <input type="text" name="nama" value="{{ $prodi->nama }}"><br>

    <label>Fakultas:</label><br>
    <select name="fakultas_id">
        @foreach ($fakultas as $f)
            <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
                {{ $f->nama_fakultas }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('prodi.index') }}">← Kembali</a>
