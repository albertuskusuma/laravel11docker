<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel biodata dengan kondisi is_aktif = 1
        $biodata = DB::select('SELECT * FROM biodata WHERE is_aktif = 1 ORDER BY id_biodata DESC');

        return view('pages.biodata.index', [
            "biodata" => $biodata
        ]);
    }

    public function create()
    {
        return view('pages.biodata.create');
    }

    public function store(Request $request)
    {
        // Validasi form (semua wajib diisi)
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ], [
            'nama.required' => 'Inputan nama wajib diisi.',
            'no_hp.required' => 'Inputan no_hp wajib diisi.',
            'jenis_kelamin.required' => 'Inputan jenis_kelamin wajib diisi.',
        ]);

        // Simpan data ke database
        DB::insert(
            'INSERT INTO biodata (nama, no_hp, jenis_kelamin, is_aktif) VALUES (?, ?, ?, ?)',
            [$request->nama, $request->no_hp, $request->jenis_kelamin, 1]
        );

        return redirect()->route('biodata')->with('success', 'Data biodata berhasil ditambahkan!');
    }
}