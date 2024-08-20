<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use App\Models\Skim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengabdians = auth()->user()->pengabdians()->paginate(10);
        return view('dosen.pengabdian.index', compact('pengabdians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skims = Skim::all();
        return view('dosen.pengabdian.create', compact('skims'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['berbasis_riset'] = $request->has('berbasis_riset') ? 1 : 0;
        $request['digunakan_di_masyarakat'] = $request->has('digunakan_di_masyarakat') ? 1 : 0;
        $validasiData = $request->validate([
            'judul' => 'required|string|max:255',
            'hibah' => 'required|string|max:255',
            'skim_id' => 'required|exists:skims,id',
            'tahun_usulan' => 'required|integer',
            'tahun_kegiatan' => 'required|integer',
            'tahun_pelaksanaan' => 'required|integer',
            'lama_kegiatan' => 'required|integer',
            'dana_dikti' => 'required|numeric',
            'dana_pt' => 'required|numeric',
            'dana_institusi_lain' => 'required|numeric',
            'posisi' => 'required|string|max:255',
            'tim_peneliti.*' => 'string|nullable',
            'mahasiswa.*' => 'string|nullable',
            'berbasis_riset' => 'nullable|boolean',
            'digunakan_di_masyarakat' => 'nullable|boolean',
            'no_sk' => 'required|string|max:255',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        foreach (['sk', 'laporan', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        $validasiData['dosen_id'] = auth()->user()->id;
        // dd($validasiData);
        Pengabdian::create($validasiData);

        return redirect()->route('pengabdian.create')->with('success', 'Data pengabdian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengabdian $pengabdian)
    {
        return view('dosen.pengabdian.show', compact('pengabdian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengabdian $pengabdian)
    {
        $skims = Skim::all();
        return view('dosen.pengabdian.edit', compact('pengabdian','skims'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengabdian $pengabdian)
    {
        $validasiData = $request->validate([
            'judul' => 'required|string|max:255',
            'hibah' => 'required|string|max:255',
            'skim_id' => 'required|exists:skims,id',
            'tahun_usulan' => 'required|integer',
            'tahun_kegiatan' => 'required|integer',
            'tahun_pelaksanaan' => 'required|integer',
            'lama_kegiatan' => 'required|integer',
            'dana_dikti' => 'required|numeric',
            'dana_pt' => 'required|numeric',
            'dana_institusi_lain' => 'required|numeric',
            'posisi' => 'required|string|max:255',
            'tim_peneliti.*' => 'string|nullable',
            'mahasiswa.*' => 'string|nullable',
            'berbasis_riset' => 'nullable|boolean',
            'digunakan_di_masyarakat' => 'nullable|boolean',
            'no_sk' => 'required|string|max:255',
            'sk' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if (empty($request->input('tim_peneliti'))) {
            $validasiData['tim_peneliti'] = null;
        }

        if (empty($request->input('mahasiswa'))) {
            $validasiData['mahasiswa'] = null;
        }

        foreach (['sk', 'laporan', 'sertifikat'] as $file) {
            if ($request->hasFile($file)) {
                if ($pengabdian->$file && Storage::exists($pengabdian->$file)) {
                    Storage::delete($pengabdian->$file);
                }
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        $pengabdian->update($validasiData);

        return redirect()->route('pengabdian.show', $pengabdian)->with('success', 'Data pengabdian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengabdian $pengabdian)
    {
         foreach (['sk', 'laporan', 'sertifikat'] as $file) {
            if ($pengabdian->$file && Storage::exists($pengabdian->$file)) {
                Storage::delete($pengabdian->$file);
            }
        }

        $pengabdian->delete();
        return redirect()->route('pengabdian.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
