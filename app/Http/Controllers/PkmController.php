<?php

namespace App\Http\Controllers;

use App\Models\Pkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pkms = auth()->user()->pkms()->paginate(10);

        return view('dosen.pkm.index', compact('pkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.pkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'kategori_pembicara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'honorarium' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'materi' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
            'ia' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        foreach (['surat_tugas', 'materi', 'laporan', 'sertifikat', 'ia'] as $file) {
            if ($request->hasFile($file)) {
                // Simpan file
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        Pkm::create($validasiData);

        return redirect()->route('pkm.create')->with('success', 'Data PKM Insidental berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pkm $pkm)
    {
        return view('dosen.pkm.show', compact('pkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pkm $pkm)
    {
        return view('dosen.pkm.edit', compact('pkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pkm $pkm)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'kategori_pembicara' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'honorarium' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'materi' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
            'ia' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['surat_tugas', 'materi', 'laporan', 'sertifikat', 'ia'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($pkm->$file && Storage::exists($pkm->$file)) {
                    Storage::delete($pkm->$file);
                }
                // Simpan file baru
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        $pkm->update($validasiData);

        return redirect()->route('pkm.show', compact('pkm'))->with('success', 'Data PKM Insidental berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pkm $pkm)
    {
        // Hapus semua file terkait jika ada
        foreach (['surat_tugas', 'materi', 'laporan', 'sertifikat', 'ia'] as $file) {
            if ($pkm->$file && Storage::exists($pkm->$file)) {
                Storage::delete($pkm->$file);
            }
        }

        // Hapus data penelitian dari database
        $pkm->delete();

        return redirect()->route('outbound.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
