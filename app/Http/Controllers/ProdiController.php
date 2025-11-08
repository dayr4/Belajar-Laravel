<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        Prodi::create($request->all());
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan.');
    }

    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        $prodi->update($request->all());
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus.');
    }
}
