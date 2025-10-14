<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>✏️ Edit Mahasiswa</h1>

    <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}">
        @csrf
        @method('PUT')
        <p>
            NIM: <input type="text" name="nim" value="{{ old('nim', $m->nim) }}">
            @error('nim') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <p>
            Nama: <input type="text" name="nama" value="{{ old('nama', $m->nama) }}">
            @error('nama') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <p>
            Prodi: <input type="text" name="prodi" value="{{ old('prodi', $m->prodi) }}">
            @error('prodi') <span style="color:red;">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Update</button>
    </form>

    <p><a href="{{ url('/mahasiswa') }}">⬅ Kembali</a></p>
</body>
</html>
