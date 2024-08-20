<?php

namespace App\Http\Controllers;

use App\Models\Haki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HakiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hakis = auth()->user()->hakis()->paginate(10);
        return view('dosen.haki.index', compact('hakis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.haki.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'jenis' => 'required|string|in:Haki,Patenn',
            'tingkat' => 'required|string|in:Nasional,Internasional',
            'produk' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'url' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('sertifikat')) {
            $validasiData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        Haki::create($validasiData);

        return redirect()->route('haki.create')->with('success', 'Data Haki/Paten Anda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Haki $haki)
    {
        return view('dosen.haki.show', compact('haki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Haki $haki)
    {
        return view('dosen.haki.edit', compact('haki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Haki $haki)
    {
        $validasiData = $request->validate([
            'jenis' => 'required|string|in:Haki,Patenn',
            'tingkat' => 'required|string|in:Nasional,Internasional',
            'produk' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'url' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('sertifikat')) {
            // Hapus file lama jika ada
            if ($haki->sertifikat && Storage::exists($haki->sertifikat)) {
                Storage::delete($haki->sertifikat);
            }
            // Simpan file baru
            $validasiData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        $haki->update($validasiData);

        return redirect()->route('haki.show', compact('haki'))->with('success', 'Data haki/paten berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Haki $haki)
    {
            if ($haki->artikel && Storage::exists($haki->artikel)) {
                Storage::delete($haki->artikel);
            }

            $haki->delete();
    
            return redirect()->route('haki.index')->with('success', 'Data haki/paten berhasil dihapus');
    }
}
