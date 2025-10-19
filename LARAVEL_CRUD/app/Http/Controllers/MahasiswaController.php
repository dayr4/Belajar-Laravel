<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /* ================================================================
     |                      BAGIAN DATA DUMMY 
     ================================================================ */
    
    // private $data = [
    //     1 => ['id'=>1, 'nim'=>'2305505001', 'nama'=>'Putu Agus', 'prodi'=>'Teknologi Informasi'],
    //     2 => ['id'=>2, 'nim'=>'2305405002', 'nama'=>'Made Cenik', 'prodi'=>'Teknik Elektro'],
    // ];

    // public function index()
    // {
    //     $mahasiswa = $this->data;
    //     return view('mahasiswa.index', compact('mahasiswa'));
    // }

    // public function create()
    // {
    //     return view('mahasiswa.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nim' => 'required|min:4',
    //         'nama' => 'required',
    //         'prodi' => 'required'
    //     ]);

    //     // karena ini dummy, data gak disimpan ke DB
    //     return redirect('/mahasiswa')->with('success', 'Mahasiswa (dummy) berhasil ditambahkan.');
    // }

    // public function edit($id)
    // {
    //     $m = $this->data[$id] ?? null;
    //     if (!$m) return redirect('/mahasiswa')->with('error','Mahasiswa tidak ditemukan');
    //     return view('mahasiswa.edit', compact('m'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nim' => 'required|min:4',
    //         'nama' => 'required',
    //         'prodi' => 'required'
    //     ]);

    //     return redirect('/mahasiswa')->with('success', 'Data mahasiswa (dummy) berhasil diperbarui.');
    // }

    /* ================================================================
     |                      BAGIAN DATABASE CRUD 
     ================================================================ */

    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan ke database.');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        $m = Mahasiswa::findOrFail($id);
        $m->update($request->all());

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui di database.');
    }

    public function destroy($id)
    {
        $m = Mahasiswa::findOrFail($id);
        $m->delete();
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
