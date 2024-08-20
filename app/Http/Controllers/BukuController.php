<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'jenis' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penulis_ke' => 'required|integer',
            'posisi' => 'required|string|in:Author,Coauthor',
            'judul' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        Buku::create($validasiData);

        return redirect()->route('publikasi.create')->with('success', 'Data publikasi buku sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('dosen.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('dosen.buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validasiData = $request->validate([
            'jenis' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penulis_ke' => 'required|integer',
            'posisi' => 'required|string|in:Author,Coauthor',
            'judul' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
        ]);

        $buku->update($validasiData);

        return redirect()->route('buku.show', compact('buku'))->with('success', 'Data buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('publikasi.index')->with('success', 'Data Buku berhasil dihapus');
    }
}
