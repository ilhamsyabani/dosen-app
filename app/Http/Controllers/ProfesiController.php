<?php

namespace App\Http\Controllers;

use App\Models\Profesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesis = auth()->user()->profesi()->paginate(10);

        return view('dosen.orgprofesi.index', compact('profesis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.orgprofesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tingkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nama_org' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'kta' => 'nullable|file|mimes:pdf,doc,docx',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validasiData['dosen_id'] = auth()->user()->id;

        foreach (['kta', 'sk'] as $file) {
            if ($request->hasFile($file)) {
                // Simpan file
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        Profesi::create($validasiData);

        return redirect()->route('profesi.create')->with('success', 'Data oraganisasi profesi di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesi $profesi) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesi $profesi)
    {
        return view('dosen.orgprofesi.edit', compact('profesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesi $profesi)
    {
        $validasiData = $request->validate([
            'tingkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nama_org' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'kta' => 'nullable|file|mimes:pdf,doc,docx',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['sk', 'kta'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($profesi->$file && Storage::exists($profesi->$file)) {
                    Storage::delete($profesi->$file);
                }
                // Simpan file baru
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }
        $profesi->update($validasiData);

        return redirect()->route('profesi.index')->with('success', 'Data oraganisasi profesi diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesi $profesi)
    {
        foreach (['sk', 'kta'] as $file) {
            if ($profesi->$file && Storage::exists($profesi->$file)) {
                Storage::delete($profesi->$file);
            }
        }

        // Hapus data profesi dari database
        $profesi->delete();

        return redirect()->route('outbound.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
