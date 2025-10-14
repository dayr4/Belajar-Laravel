<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
</head>
<body>
  <h1>Tambah Mahasiswa (Dummy)</h1>

  @if ($errors->any())
    <div style="color: red;">
      <ul>
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ url('/mahasiswa') }}" method="post">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ old('nim') }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br>

    <label>Prodi:</label><br>
    <input type="text" name="prodi" value="{{ old('prodi') }}"><br><br>

    <button type="submit">Simpan</button>
  </form>
</body>
</html>
