<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $jabatan = Jabatan::where('dosen_id', auth()->user()->id)->first();

        return view('dosen.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $verifikasi = $request->validate([
            'nidn_nuptk' => 'required|string|max:20',
            'jabatan_fungsional' => 'required',
            'jabatan_struktural' => 'required',
            'pangkat' => 'required',
            'status_kepegawaian' => 'required',
            'status_aktif' => 'required',
        ]);

        $verifikasi['dosen_id'] = auth()->user()->id;

        Jabatan::create($verifikasi);

        return redirect()->route('jabatan.index')->with('success', 'Data berhasil ditambahkan');
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('dosen.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $verifikasiData = $request->validate([
           'nidn_nuptk' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('jabatans', 'nidn_nuptk')->ignore($jabatan->id),
            ],
            'jabatan_fungsional' => 'required',
            'jabatan_struktural' => 'required',
            'pangkat' => 'required',
            'status_kepegawaian' => 'required',
            'status_aktif' => 'required',
        ]);

        $jabatan->update($verifikasiData);

        return redirect()->route('jabatan.index')->with('success', 'Data berhasil diperbarui');
    }
  
}
