<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbingans = auth()->user()->bimbingans;

        return view('dosen.bimbingan.index', compact('bimbingans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = array_combine(range(date('Y'), 2020), range(date('Y'), 2020));
        $departemens = Departemen::pluck('nama', 'id'); 
        return view('dosen.bimbingan.create', compact('years', 'departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string',
            'tahun_ajaran' => 'required|string|size:4',
            'jenjang' => 'required|string',
            'prodi' => 'required|string',
            'peran' => 'required|string',
            'frekuiensi' => 'required|string',
            'buku_bimbingan' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_pembimbing' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validated['dosen_id'] = auth()->user()->id;
        Bimbingan::create($validated);

        return redirect()->route('bimbingan.create')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimbingan $bimbingan)
    {
        return view('dosen.bimbingan.show', compact('bimbingan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimbingan $bimbingan)
    {
        $years = array_combine(range(date('Y'), 2020), range(date('Y'), 2020));
        $departemens = Departemen::pluck('nama', 'id'); 
        return view('dosen.bimbingan.edit', compact('bimbingan', 'years', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimbingan $bimbingan)
    {
        $validatedData = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string',
            'tahun_ajaran' => 'required|string|size:4',
            'jenjang' => 'required|string',
            'prodi' => 'required|string',
            'peran' => 'required|string',
            'frekuiensi' => 'required|string',
            'buku_bimbingan' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_pembimbing' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validatedData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('buku_bimbingan')) {
            $validatedData['buku_bimbingan'] = $request->file('buku_bimbingan')->store('buku_bimbingan');
        }

        if ($request->hasFile('sk_pembimbing')) {
            $validatedData['sk_pembimbing'] = $request->file('sk_pembimbing')->store('sk_pembimbing');
        }

        $bimbingan->update($validatedData);

        return redirect()->route('bimbingan.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimbingan $bimbingan)
    {

        if ($bimbingan->sk_pembimbing && Storage::exists($bimbingan->sk_pembimbing)) {
            Storage::delete($bimbingan->sk_pembimbing);
        }

        if ($bimbingan->buku_bimbingan && Storage::exists($bimbingan->buku_bimbingan)) {
            Storage::delete($bimbingan->buku_bimbingan);
        }
        $bimbingan->delete();
        return redirect()->route('bimbingan.index')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
