<h2>Edit Fakultas</h2>

<form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Fakultas:</label><br>
    <input type="text" name="nama_fakultas" value="{{ $fakultas->nama_fakultas }}"><br><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('fakultas.index') }}">← Kembali</a>
