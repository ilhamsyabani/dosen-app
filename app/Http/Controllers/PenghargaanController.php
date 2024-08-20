<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghargaans = auth()->user()->penghargaan()->paginate(10);

        return view('dosen.penghargaan.index', compact('penghargaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.penghargaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tingkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tahun' => 'required|string|max:4',
            'instansi' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('sertifikat')) {
            $validateData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }
        Penghargaan::create($validasiData);

        return redirect()->route('penghargaan.create')->with('success', 'Data penghargaan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghargaan $penghargaan)
    {
        return view('dosen.penghargaan.show', compact('penghargaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghargaan $penghargaan)
    {
        return view('dosen.penghargaan.edit', compact('penghargaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghargaan $penghargaan)
    {
        $validasiData = $request->validate([
            'tingkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tahun' => 'required|string|max:4',
            'instansi' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('sertifikat')) {
            // Hapus file lama jika ada
            if ($penghargaan->sertifikat && Storage::exists($penghargaan->sertifikat)) {
                Storage::delete($penghargaan->sertifikat);
            }
            // Simpan file baru
            $validasiData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        $penghargaan->update($validasiData);

        return redirect()->route('penghargaan.index')->with('success', 'Data penghargaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghargaan $penghargaan)
    {
        if ($penghargaan->sertifikat && Storage::exists($penghargaan->sertifikat)) {
            Storage::delete($penghargaan->sertifikat);
        }
        // Hapus data outbound dari database
        $penghargaan->delete();

        return redirect()->route('penghargaan.index')->with('success', 'Data penghargaan berhasil dihapus');
    }
}
