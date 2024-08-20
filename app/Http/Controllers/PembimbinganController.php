<?php

namespace App\Http\Controllers;

use App\Models\Pembimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembimbingans = auth()->user()->pembimbingans()->paginate(10);

        return view('dosen.pembimbingan.index', compact('pembimbingans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.pembimbingan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kegiatan' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'banyaknya_bimbingan' => 'required|string|max:255',
            'bukti_bimbingan_sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('bukti_bimbingan_sk')) {
            $validasiData['bukti_bimbingan_sk'] = $request->file('bukti_bimbingan_sk')->store('bukti_bimbingan_sk');
        }

        $validasiData['dosen_id'] = auth()->user()->id;

        Pembimbingan::create($validasiData);

        return redirect()->route('pembimbingan.create')->with('success', 'Data pembibingan mahasiswa berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembimbingan $pembimbingan)
    {
        return view('dosen.pembimbingan.show', compact('pembimbingan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembimbingan $pembimbingan)
    {
        return view('dosen.pembimbingan.edit', compact('pembimbingan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembimbingan $pembimbingan)
    {
        $validasiData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'banyaknya_bimbingan' => 'required|string|max:255',
            'bukti_bimbingan_sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('bukti_bimbingan_sk')) {
            // Hapus file lama jika ada
            if ($pembimbingan->bukti_bimbingan_sk && Storage::exists($pembimbingan->bukti_bimbingan_sk)) {
                Storage::delete($pembimbingan->bukti_bimbingan_sk);
            }
            // Simpan file baru
            $validasiData['bukti_bimbingan_sk'] = $request->file('bukti_bimbingan_sk')->store('bukti_bimbingan_sk');
        }

        $pembimbingan->update($validasiData);

        return redirect()->route('pembimbingan.index')->with('success', 'Data pembibingan mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembimbingan $pembimbingan)
    {

        if ($pembimbingan->bukti_bimbingan_sk && Storage::exists($pembimbingan->bukti_bimbingan_sk)) {
            Storage::delete($pembimbingan->bukti_bimbingan_sk);
        }

        $pembimbingan->delete();

        return redirect()->route('pembimbingan.index')
            ->with('success', 'Pembimbingan berhasil dihapus.');
    }
}
