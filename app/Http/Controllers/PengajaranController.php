<?php

namespace App\Http\Controllers;

use App\Models\Pengajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajarans =  auth()->user()->pengajarans;

        return view('dosen.pengajaran.index', compact('pengajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.pengajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|size:4',
            'semester' => 'required|string',
            'sks' => 'required|string',
            'jenjang' => 'required|string',
            'prodi' => 'required|string',
            'bentuk' => 'required|string',
            'rpp' => 'required|file|mimes:pdf,doc,docx',
            'presensi' => 'nullable|file|mimes:pdf,doc,docx',
            'daftar_nilai' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_mengajar' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validatedData['dosen_id'] = auth()->user()->id;

        if ($request->hasFile('rpp')) {
            $validatedData['rpp'] = $request->file('rpp')->store('rpp');
        }
        if ($request->hasFile('presensi')) {
            $validatedData['presensi'] = $request->file('presensi')->store('presensi');
        }
        if ($request->hasFile('daftar_nilai')) {
            $validatedData['daftar_nilai'] = $request->file('daftar_nilai')->store('daftar_nilai');
        }
        if ($request->hasFile('sk_mengajar')) {
            $validatedData['sk_mengajar'] = $request->file('sk_mengajar')->store('sk_mengajar');
        }

        Pengajaran::create($validatedData);

        return redirect()->route('pengajaran.create')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajaran $pengajaran)
    {
        return view('dosen.pengajaran.view', compact('pengajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajaran $pengajaran)
    {
        return view('dosen.pengajaran.edit', compact('pengajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajaran $pengajaran)
    {
        $validatedData = $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|size:4',
            'semester' => 'required|string',
            'sks' => 'required|string',
            'jenjang' => 'required|string',
            'prodi' => 'required|string',
            'bentuk' => 'required|string',
            'rpp' => 'nullable|file|mimes:pdf,doc,docx',
            'presensi' => 'nullable|file|mimes:pdf,doc,docx',
            'daftar_nilai' => 'nullable|file|mimes:pdf,doc,docx',
            'sk_mengajar' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('rpp')) {
            $validatedData['rpp'] = $request->file('rpp')->store('rpp');
        }
        if ($request->hasFile('presensi')) {
            $validatedData['presensi'] = $request->file('presensi')->store('presensi');
        }
        if ($request->hasFile('daftar_nilai')) {
            $validatedData['daftar_nilai'] = $request->file('daftar_nilai')->store('daftar_nilai');
        }
        if ($request->hasFile('sk_mengajar')) {
            $validatedData['sk_mengajar'] = $request->file('sk_mengajar')->store('sk_mengajar');
        }

        $pengajaran->update($validatedData);

        return redirect()->route('pengajaran.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajaran $pengajaran)
    {
        if ($pengajaran->rpp && Storage::exists($pengajaran->rpp)) {
            Storage::delete($pengajaran->rpp);
        }

        if ($pengajaran->presensi && Storage::exists($pengajaran->presensi)) {
            Storage::delete($pengajaran->presensi);
        }

        if ($pengajaran->daftar_nilai && Storage::exists($pengajaran->daftar_nilai)) {
            Storage::delete($pengajaran->daftar_nilai);
        }

        if ($pengajaran->sk_mengajar && Storage::exists($pengajaran->sk_mengajar)) {
            Storage::delete($pengajaran->sk_mengajar);
        }

        $pengajaran->delete();

        return redirect()->route('pengajaran.index')
            ->with('success', 'Matakuliah berhasil dihapus.');
    }
}
