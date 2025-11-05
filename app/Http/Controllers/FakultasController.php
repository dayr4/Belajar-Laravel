<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_fakultas' => 'required']);
        Fakultas::create($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_fakultas' => 'required']);
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Fakultas::findOrFail($id)->delete();
        return redirect()->route('fakultas.index')->with('success', 'Data berhasil dihapus.');
    }
}
