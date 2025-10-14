<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
</head>
<body>
  <h1>Edit Mahasiswa (Dummy)</h1>

  @if ($errors->any())
    <div style="color: red;">
      <ul>
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ url('/mahasiswa/'.$m['id']) }}" method="post">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ old('nim', $m['NIM'] ?? $m['nim']) }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $m['Nama'] ?? $m['nama']) }}"><br>

    <label>Prodi:</label><br>
    <input type="text" name="prodi" value="{{ old('prodi', $m['Prodi'] ?? $m['prodi']) }}"><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>
