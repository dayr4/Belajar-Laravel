<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private $data = [
        1 => ['id'=>1, 'nim'=>'2305505001', 'nama'=>'Putu Agus', 'prodi'=>'Teknologi Informasi'],
        2 => ['id'=>2, 'nim'=>'2305405002', 'nama'=>'Made Cenik', 'prodi'=>'Teknik Elektro'],
    ];

    public function index()
    {
        $mahasiswa = $this->data;
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan (dummy).');
    }

    public function edit($id)
    {
        $m = $this->data[$id] ?? null;
        if (!$m) return redirect('/mahasiswa')->with('error','Mahasiswa tidak ditemukan');
        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa (dummy) berhasil diperbarui.');
    }
}
