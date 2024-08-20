<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengelolas = auth()->user()->pengelolas()->paginate(10);

        return view('dosen.pengelola.index', compact('pengelolas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.pengelola.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'peran' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('sk')) {
            $validasiData['sk'] = $request->file('sk')->store('sk');
        }

        Pengelola::create($validasiData);

        return redirect()->route('pengelola.create')->with('success', 'Data pengelola jurnal berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengelola $pengelola)
    {
        return view('dosen.pengelola.show', compact('pengelola'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengelola $pengelola)
    {
        return view('dosen.pengelola.edit', compact('pengelola'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengelola $pengelola)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'peran' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        if ($request->hasFile('sk')) {
            // Hapus file lama jika ada
            if ($pengelola->sk && Storage::exists($pengelola->sk)) {
                Storage::delete($pengelola->sk);
            }
            // Simpan file baru
            $validasiData['sk'] = $request->file('sk')->store('sk');
        }

        // Update data pengelola
        $pengelola->update($validasiData);

        return redirect()->route('pengelola.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengelola $pengelola)
    {
        if ($pengelola->sk && Storage::exists($pengelola->sk)) {
            Storage::delete($pengelola->sk);
        }

        $pengelola->delete();

        return redirect()->route('pengelola.index')->with('success', 'Data pengelolaan jurnal berhasil dihapus');
    }
}
