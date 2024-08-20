<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kategori' => 'required|string|in:jurnal,Prosiding',
            'penulis' => 'required|string|max:255',
            'penulis_ke' => 'required|integer',
            'posisi' => 'required|string',
            'judul' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'jenis_jurnal' => 'required|string|in:Penelitian,Pengabdian',
            'tanggal' => 'required|date',
            'volume' => 'nullable|integer',
            'halaman' => 'nullable|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'doi_url' => 'nullable|string|max:255',
            'kategori_jurnal' => 'required|string|in:Nasional,Internasional',
            'terindeks' => 'required|string|in:Terindeks,Tidak Terindeks',
            'sinta' => 'nullable|string|in:Sinta 1-2,Sinta 3-4,Sinta 5-6',
            'q' => 'nullable|string|in:Q1,Q2,Q3,Q4,Non-Q',
            'issn' => 'nullable|string|max:255',
            'pelaksana' => 'nullable|string|max:255',
            'artikel' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('artikel')) {
            $validasiData['artikel'] = $request->file('artikel')->store('artikel');
        }

        Jurnal::create($validasiData);

        return redirect()->route('publikasi.create')->with('success', 'Data publikasi berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        return view('dosen.jurnal.show', compact('jurnal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        return view('dosen.jurnal.edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        $validasiData = $request->validate([
            'kategori' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penulis_ke' => 'required|integer',
            'posisi' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'jenis_jurnal' => 'required|string|in:Penelitian,Pengabdian',
            'tanggal' => 'required|date',
            'volume' => 'nullable|integer',
            'halaman' => 'nullable|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'doi_url' => 'nullable|string|max:255',
            'kategori_jurnal' => 'required|string|in:Nasional,Internasional',
            'terindeks' => 'required|string|in:Terindeks,Tidak Terindeks',
            'sinta' => 'nullable|string|in:Sinta 1-2,Sinta 3-4,Sinta 5-6',
            'q' => 'nullable|string|in:Q1,Q2,Q3,Q4,Non-Q',
            'issn' => 'nullable|string|max:255',
            'pelaksana' => 'nullable|string|max:255',
            'artikel' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('artikel')) {
            // Hapus file lama jika ada
            if ($jurnal->artikel && Storage::exists($jurnal->artikel)) {
                Storage::delete($jurnal->artikel);
            }
            // Simpan file baru
            $validasiData['artikel'] = $request->file('artikel')->store('artikel');
        }

        $jurnal->update($validasiData);

        return redirect()->route('jurnal.show', compact('jurnal'))->with('success', 'Data jurnal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
         
         if ($jurnal->artikel && Storage::exists($jurnal->artikel)) {
            Storage::delete($jurnal->artikel);
        }

        $jurnal->delete();

        return redirect()->route('publikasi.index')->with('success', 'Data jurnal berhasil dihapus');
    
    }
}
