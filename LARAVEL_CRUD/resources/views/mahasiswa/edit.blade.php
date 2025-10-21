<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>✏️ Edit Mahasiswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mahasiswa.update', $m->id) }}">
        @csrf
        @method('PUT')

        <p>
            <label>NIM:</label><br>
            <input type="text" name="nim" value="{{ old('nim', $m->nim) }}">
        </p>

        <p>
            <label>Nama:</label><br>
            <input type="text" name="nama" value="{{ old('nama', $m->nama) }}">
        </p>

        <p>
            <label>Alamat:</label><br>
            <textarea name="alamat">{{ old('alamat', $m->alamat) }}</textarea>
        </p>

        <p>
            <label>Program Studi:</label><br>
            <select name="prodi_id">
                @foreach ($prodi as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $m->prodi_id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Update</button>
    </form>

    <p><a href="{{ route('mahasiswa.index') }}">⬅ Kembali</a></p>
</body>
</html>
