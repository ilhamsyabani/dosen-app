<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kunjungans = auth()->user()->kunjungans()->paginate(10);

        return view('dosen.kunjungan.index', compact('kunjungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.kunjungan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required|date',
            'jenjang' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'matkul' => 'required|string|max:255',
            'undangan' => 'nullable|file|mimes:pdf,doc,docx',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'ia' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        foreach (['undangan', 'surat_tugas', 'ai'] as $file) {
            if ($request->hasFile($file)) {
                // Simpan file
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        kunjungan::create($validasiData);

        return redirect()->route('kunjungan.create')->with('success', 'data kunjungan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kunjungan $kunjungan)
    {
        return view('dosen.kunjungan.show', compact('kunjungan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        return view('dosen.kunjungan.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required|date',
            'jenjang' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'matkul' => 'required|string|max:255',
            'undangan' => 'nullable|file|mimes:pdf,doc,docx',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'ia' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['undangan', 'surat_tugas', 'ai'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($kunjungan->$file && Storage::exists($kunjungan->$file)) {
                    Storage::delete($kunjungan->$file);
                }
                // Simpan file baru
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        $kunjungan->update($validasiData);

        return redirect()->route('kunjungan.show', $kunjungan)->with('success', 'Data kunjungan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        foreach (['undangan', 'surat_tugas', 'ai'] as $file) {
            if ($kunjungan->$file && Storage::exists($kunjungan->$file)) {
                Storage::delete($kunjungan->$file);
            }
        }

        // Hapus data kunjungan dari database
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
