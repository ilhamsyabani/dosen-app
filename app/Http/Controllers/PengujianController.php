<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Pengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pengujians = auth()->user()->pengujians;

        return view('dosen.pengujian.index', compact('pengujians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemens = Departemen::pluck('nama', 'id'); 
        return view('dosen.pengujian.create', compact('departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required|date',
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'undangan' => 'nullable|file|mimes:pdf,doc,docx',
            'lembar_pengesahan' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_pengujian' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('undangan')) {
            $validasiData['undangan'] = $request->file('undangan')->store('undangan');
        }
        if ($request->hasFile('lembar_pengesahan')) {
            $validasiData['lembar_pengesahan'] = $request->file('lembar_pengesahan')->store('lembar_pengesahan');
        }
        if ($request->hasFile('sk_pengujian')) {
            $validasiData['sk_pengujian'] = $request->file('sk_pengujian')->store('sk_pengujian');
        }

        Pengujian::create($validasiData);

        return redirect()->route('pengujian.create')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengujian $pengujian)
    {
        return view('dosen.pengujian.show', compact('pengujian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengujian $pengujian)
    {
        $departemens = Departemen::pluck('nama', 'id'); 
        return view('dosen.pengujian.edit', compact('pengujian', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengujian $pengujian)
    {
        $validateData = $request->validate([
            'tanggal' => 'required|date',
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'undangan' => 'nullable|file|mimes:pdf,doc,docx',
            'lembar_pengesahan' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_pengujian' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('undangan')) {
            $validateData['undangan'] = $request->file('undangan')->store('undangan');
        }
        if ($request->hasFile('lembar_pengesahan')) {
            $validateData['lembar_pengesahan'] = $request->file('lembar_pengesahan')->store('lembar_pengesahan');
        }
        if ($request->hasFile('sk_pengujian')) {
            $validateData['sk_pengujian'] = $request->file('sk_pengujian')->store('sk_pengujian');
        }

        $pengujian->update($validateData);

        return redirect()->route('pengujian.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengujian $pengujian)
    {
        if ($pengujian->undangan && Storage::exists($pengujian->undangan)) {
            Storage::delete($pengujian->undangan);
        }

        if ($pengujian->lembar_pengesahan && Storage::exists($pengujian->lembar_pengesahan)) {
            Storage::delete($pengujian->lembar_pengesahan);
        }

        if ($pengujian->sk_penguji && Storage::exists($pengujian->sk_penguji)) {
            Storage::delete($pengujian->sk_penguji);
        }

        $pengujian->delete();

        return redirect()->route('pengajaran.index')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
