<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Pembinaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembinaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembinaans = auth()->user()->pembinaans()->paginate(10);

        return view('dosen.pembinaan.index', compact('pembinaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemens = Departemen::pluck('nama', 'id');
        return view('dosen.pembinaan.create', compact('departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'jenis_program' => 'required|string|max:255',
            'nama_program' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'sk_pembinaan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validasiData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('sk_pembinaan')) {
            $validasiData['sk_pembinaan'] = $request->file('sk_pembinaan')->store('sk_pembinaan');
        }
        if ($request->hasFile('sertifikat')) {
            $validasiData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        Pembinaan::create($validasiData);

        return redirect()->route('pembinaan.create')->with('success', 'Data Pembinaan Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembinaan $pembinaan)
    {
        return view('dosen.pembinaan.show', compact('pembinaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembinaan $pembinaan)
    {
        $departemens = Departemen::pluck('nama', 'id');
        return view('dosen.pembinaan.edit', compact('pembinaan', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembinaan $pembinaan)
    {
        $validasiData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'jenis_program' => 'required|string|max:255',
            'nama_program' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'sk_pembinaan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('sk_pembinaan')) {
            // Hapus file lama jika ada
            if ($pembinaan->sk_pembinaan && Storage::exists($pembinaan->sk_pembinaan)) {
                Storage::delete($pembinaan->sk_pembinaan);
            }
            // Simpan file baru
            $validasiData['sk_pembinaan'] = $request->file('sk_pembinaan')->store('sk_pembinaan');
        }

        if ($request->hasFile('sertifikat')) {
            // Hapus file lama jika ada
            if ($pembinaan->sertifikat && Storage::exists($pembinaan->sertifikat)) {
                Storage::delete($pembinaan->sertifikat);
            }
            // Simpan file baru
            $validasiData['sertifikat'] = $request->file('sertifikat')->store('sertifikat');
        }

        $pembinaan->update($validasiData);

        return redirect()->route('pembinaan.index')->with('success', 'Data pembinaan mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembinaan $pembinaan)
    {
        //
    }
}
