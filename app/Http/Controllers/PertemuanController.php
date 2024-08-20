<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertemuans = auth()->user()->pertemuan()->paginate(10);

        return view('dosen.pertemuan.index', compact('pertemuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.pertemuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'peran' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama_pertemuan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validData['dosen_id'] = auth()->user()->id;

        foreach (['surat_tugas', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                // Simpan file
                $validData[$file] = $request->file($file)->store($file);
            }
        }

        Pertemuan::create($validData);

        return redirect()->route('pertemuan.create')->with('success', 'Data pertemuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertemuan $pertemuan)
    {
        return view('dosen.pertemuan.show', compact('pertemuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertemuan $pertemuan)
    {
        return view('dosen.pertemuan.edit', compact('pertemuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertemuan $pertemuan)
    {
        $validData = $request->validate([
            'peran' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama_pertemuan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['sk', 'surat_tugas', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($pertemuan->$file && Storage::exists($pertemuan->$file)) {
                    Storage::delete($pertemuan->$file);
                }
                // Simpan file baru
                $validData[$file] = $request->file($file)->store($file);
            }
        }
        $pertemuan->update($validData);

        return redirect()->route('pertemuan.index')->with('success', 'Data pertemuan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertemuan $pertemuan)
    {
        foreach (['surat_tugas', 'sertifikat'] as $file) {
            if ($pertemuan->$file && Storage::exists($pertemuan->$file)) {
                Storage::delete($pertemuan->$file);
            }
        }

        $pertemuan->delete();

        return redirect()->route('pertemuan.index')->with('success', 'Data pertemuan berhasil dihapus');
    }
}
