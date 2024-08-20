<?php

namespace App\Http\Controllers;

use App\Models\Eksternal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eksternals = auth()->user()->eksternals()->paginate();

        return view('dosen.eksternal.index', compact('eksternals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.eksternal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required|date',
            'jenjang' => 'required|max:255|string',
            'universitas' => 'required|max:255|string',
            'fakultas' => 'required|max:255|string',
            'prodi' => 'required|max:255|string',
            'matakuliah' => 'required|max:255|string',
            'sks' => 'required|max:255|string',
            'sk_mengajar' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('sk_mengajar')) {
            $validasiData['sk_mengajar'] = $request->file('sk_mengajar')->store('sk_mengajar');
        }

        $validasiData['dosen_id'] = auth()->user()->id;

        Eksternal::create($validasiData);

        return redirect()->route('eksternal.create')->with('success', 'Data pengajaran luar kampus berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eksternal $eksternal)
    {
        return view('dosen.eksternal.show', compact('eksternal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eksternal $eksternal)
    {
        return view('dosen.eksternal.edit', compact('eksternal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eksternal $eksternal)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required|date',
            'jenjang' => 'required|max:255|string',
            'universitas' => 'required|max:255|string',
            'fakultas' => 'required|max:255|string',
            'prodi' => 'required|max:255|string',
            'matakuliah' => 'required|max:255|string',
            'sks' => 'required|max:255|string',
            'sk_mengajar' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('sk_mengajar')) {
            // Hapus file lama jika ada
            if ($eksternal->sk_mengajar && Storage::exists($eksternal->sk_mengajar)) {
                Storage::delete($eksternal->sk_mengajar);
            }
            // Simpan file baru
            $validasiData['sk_mengajar'] = $request->file('sk_mengajar')->store('sk_mengajar');
        }

        $eksternal->update($validasiData);

        return redirect()->route('eksternal.show', $eksternal)->with('success', 'Data pengajaran luar kampus berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eksternal $eksternal)
    {
        if ($eksternal->sk_mengajar && Storage::exists($eksternal->sk_mengajar)) {
            Storage::delete($eksternal->sk_mengajar);
        }

        // Hapus data outbound dari database
        $eksternal->delete();

        return redirect()->route('eksternal.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
