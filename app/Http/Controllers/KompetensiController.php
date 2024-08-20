<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kompetensis = auth()->user()->kompetensis;
        
        return view('dosen.kompetensi.index', compact('kompetensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.kompetensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kompetensi' => 'required|string|max:255',
            'no_sertifikat' => 'nullable|string|max:255',
            'tahun_sertifikat' => 'nullable|string|max:4',
            'institusi_sertifikat' => 'nullable|string|max:255',
            'bidang_kompetensi' => 'nullable|string|max:255',
            'jam_pelajaran' => 'nullable|string|max:255',
            'jenis_diklat' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'keterangan' => 'nullable|string',
            'sk_penugasan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $validatedData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('sk_penugasan')) {
            $validatedData['sk_penugasan'] = $request->file('sk_penugasan')->store('sk_penugasan');
        }

        if ($request->hasFile('sertifikat')) {
            $validatedData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        Kompetensi::create($validatedData);

        return redirect()->route('kompetensi.create')
            ->with('success', 'Kompetensi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kompetensi $kompetensi)
    {
        return view('dosen.kompetensi.show', compact('kompetensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kompetensi $kompetensi)
    {
        return view('dosen.kompetensi.edit', compact('kompetensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kompetensi $kompetensi)
    {
        $validatedData = $request->validate([
            'nama_kompetensi' => 'required|string|max:255',
            'no_sertifikat' => 'nullable|string|max:255',
            'tahun_sertifikat' => 'nullable|string|max:4',
            'institusi_sertifikat' => 'nullable|string|max:255',
            'bidang_kompetensi' => 'nullable|string|max:255',
            'jam_pelajaran' => 'nullable|string|max:255',
            'jenis_diklat' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'keterangan' => 'nullable|string',
            'sk_penugasan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('sk_penugasan')) {
            if ($kompetensi->sk_penugasan && Storage::exists($kompetensi->sk_penugasan)) {
                Storage::delete($kompetensi->sk_penugasan);
            }
            $validatedData['sk_penugasan'] = $request->file('sk_penugasan')->store('sk_penugasan');
        }

        if ($request->hasFile('sertifikat')) {
            if ($kompetensi->sertifikat && Storage::exists($kompetensi->sertifikat)) {
                Storage::delete($kompetensi->sertifikat);
            }
            $validatedData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        $kompetensi->update($validatedData);

        return redirect()->route('kompetensi.index')
            ->with('success', 'Kompetensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kompetensi $kompetensi)
    {
        if ($kompetensi->sk_penugasan && Storage::exists($kompetensi->sk_penugasan)) {
            Storage::delete($kompetensi->sk_penugasan);
        }

        if ($kompetensi->sertifikat && Storage::exists($kompetensi->sertifikat)) {
            Storage::delete($kompetensi->sertifikat);
        }

        $kompetensi->delete();

        return redirect()->route('kompetensi.index')
            ->with('success', 'Kompetensi berhasil dihapus.');
    }
}
