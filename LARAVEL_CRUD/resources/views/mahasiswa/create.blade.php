<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>➕ Tambah Mahasiswa</h1>

    <form method="POST" action="{{ url('/mahasiswa') }}">
        @csrf
        <p>
            NIM: <input type="text" name="nim" value="{{ old('nim') }}">
            @error('nim') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <p>
            Nama: <input type="text" name="nama" value="{{ old('nama') }}">
            @error('nama') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <p>
            Prodi: <input type="text" name="prodi" value="{{ old('prodi') }}">
            @error('prodi') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ url('/mahasiswa') }}">⬅ Kembali</a></p>
</body>
</html>
