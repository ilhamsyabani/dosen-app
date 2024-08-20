<?php

namespace App\Http\Controllers;

use App\Models\Delegasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DelegasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delegasis = auth()->user()->delegasi()->paginate(10);

        return view('dosen.delegasi.index', compact('delegasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.delegasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'peran' => 'required|string|max:255',
            'nama_pertemuan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('surat_tugas')) {
            $validData['surat_tugas'] = $request->file('surat_tugas')->store('surat_tugas');
        }

        Delegasi::create($validData);

        return redirect()->route('delegasi.create')->with('success', 'Data delegasi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delegasi $delegasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delegasi $delegasi)
    {
        return view('dosen.delegasi.edit', compact('delegasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delegasi $delegasi)
    {
        $validData = $request->validate([
            'peran' => 'required|string|max:255',
            'nama_pertemuan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'surat_tugas' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('surat_tugas')) {
            // Hapus file lama jika ada
            if ($delegasi->surat_tugas && Storage::exists($delegasi->surat_tugas)) {
                Storage::delete($delegasi->surat_tugas);
            }
            // Simpan file baru
            $validData['surat_tugas'] = $request->file('surat_tugas')->store('surat_tugas');
        }

        $delegasi->update($validData);

        return redirect()->route('delegasi.index')->with('success', 'Data delegasi berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegasi $delegasi)
    {
        if ($delegasi->sk && Storage::exists($delegasi->sk)) {
            Storage::delete($delegasi->sk);
        }

        $delegasi->delete();

        return redirect()->route('delegasi.index')->with('success', 'Data delegasil berhasil dihapus');
    }
}
