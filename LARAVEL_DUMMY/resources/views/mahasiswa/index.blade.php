<!DOCTYPE html>
<html>
<head>
  <title>Daftar Mahasiswa</title>
</head>
<body>
  <h1>Daftar Mahasiswa (Dummy Data)</h1>

  @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
  @endif
  @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
  @endif

  <a href="{{ url('/mahasiswa/create') }}">Tambah Mahasiswa</a>

  <table border="1" cellpadding="6" cellspacing="0" style="margin-top: 10px;">
    <tr>
      <th>ID</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr>

    @foreach($mahasiswa as $m)
      <tr>
        <td>{{ $m['id'] }}</td>
        <td>{{ $m['NIM'] ?? $m['nim'] }}</td>
        <td>{{ $m['Nama'] ?? $m['nama'] }}</td>
        <td>{{ $m['Prodi'] ?? $m['prodi'] }}</td>
        <td>
          <a href="{{ url('/mahasiswa/'.$m['id'].'/edit') }}">Edit</a>
        </td>
      </tr>
    @endforeach
  </table>
</body>
</html>
