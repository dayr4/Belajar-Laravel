<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'nullable',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $m = Mahasiswa::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa berhasil ditambahkan',
            'data' => $m
        ], 201);
    }
}
