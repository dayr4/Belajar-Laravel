<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::with('prodi.fakultas')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'nullable',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json(['message' => 'Mahasiswa ditambahkan', 'data' => $mahasiswa]);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->findOrFail($id);
        return response()->json($mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json(['message' => 'Mahasiswa diperbarui', 'data' => $mahasiswa]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa dihapus']);
    }
}
