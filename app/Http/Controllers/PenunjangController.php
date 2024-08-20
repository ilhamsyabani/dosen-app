<?php

namespace App\Http\Controllers;

use App\Models\Penunjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penunjangs = auth()->user()->penunjang()->paginate(10);

        return view('dosen.penunjang.index', compact('penunjangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.penunjang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kepanitiaan' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validasiData['dosen_id'] = auth()->user()->id;

        foreach (['sk', 'surat_tugas', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                // Simpan file
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        Penunjang::create($validasiData);

        return redirect()->route('penunjang.create')->with('success', 'Data penunjang berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Penunjang $penunjang)
    {
        return view('dosen.penunjang.show', compact('penunjang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penunjang $penunjang)
    {
        return view('dosen.penunjang.edit', compact('penunjang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penunjang $penunjang)
    {
        $validasiData = $request->validate([
            'kepanitiaan' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['sk', 'surat_tugas', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($penunjang->$file && Storage::exists($penunjang->$file)) {
                    Storage::delete($penunjang->$file);
                }
                // Simpan file baru
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }
        $penunjang->update($validasiData);

        return redirect()->route('penunjang.index')->with('success', 'Data penunjang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penunjang $penunjang)
    {
        foreach (['sk', 'surat_tugas', 'sertifikat'] as $file) {
            if ($penunjang->$file && Storage::exists($penunjang->$file)) {
                Storage::delete($penunjang->$file);
            }
        }

        $penunjang->delete();

        return redirect()->route('penunjang.index')->with('success', 'Data penunjang berhasil dihapus');
    }
}
