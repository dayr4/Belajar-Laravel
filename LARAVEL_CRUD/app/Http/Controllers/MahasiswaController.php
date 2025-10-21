<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'nullable',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('m', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'alamat' => 'nullable',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $m = Mahasiswa::findOrFail($id);
        $m->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $m = Mahasiswa::findOrFail($id);
        $m->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
