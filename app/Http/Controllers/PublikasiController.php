<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnals = auth()->user()->jurnals()->paginate(10);
        $publikasis = auth()->user()->publikasis()->paginate(10);
        $bukus = auth()->user()->bukus()->paginate(10);

        return view('dosen.publikasi.index', compact('jurnals', 'publikasis', 'bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('dosen.publikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tipe' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'media_masa' => 'nullable|string|max:255',
            'penyelengaara' => 'nullable|string|max:255',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        Publikasi::create($validasiData);

        return redirect()->route('publikasi.create')->with('success', 'Data Publikasi Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publikasi $publikasi)
    {
        return view('dosen.publikasi.show', compact('publikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publikasi $publikasi)
    {
        return view('dosen.publikasi.edit', compact('publikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publikasi $publikasi)
    {
        $validasiData = $request->validate([
            'tipe' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'media_masa' => 'nullable|string|max:255',
            'penyelengaara' => 'nullable|string|max:255',
        ]);

        $publikasi->update($validasiData);

        return redirect()->route('publikasi.index', compact('publikasi'))->with('success', 'Data Publikasi Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publikasi $publikasi)
    {
        $publikasi->delete();
        return redirect()->route('publikasi.index')->with('success', 'Data jurnal berhasil dihapus');
    }
}
