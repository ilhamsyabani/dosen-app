<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use App\Models\Skim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penelitians = auth()->user()->penelitians()->with('skim')->paginate(10);

        return view('dosen.penelitian.index', compact('penelitians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skims = Skim::pluck('nama', 'id');
        return view('dosen.penelitian.create', compact('skims'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'tim_peneliti.*' => 'required|string',
            'mahasiswa.*' => 'nullable|string',
            'digunakan_di_masyarakat' => 'nullable|boolean',
            'no_sk' => 'required|string|max:255',
            'sk_penugasan' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'kontrak_penelitian' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        $validasiData['dosen_id'] = auth()->user()->id;

        foreach (['sk_penugasa', 'laporan', 'kontrak_penelitian'] as $file) {
            if ($request->hasFile($file)) {
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        Penelitian::create($validasiData);

        return redirect()->route('penelitian.create')->with('success', 'Data penelitian berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penelitian $penelitian)
    {
        return view('dosen.penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penelitian $penelitian)
    {
        $skims = Skim::pluck('nama', 'id');
        return view('dosen.penelitian.edit', compact('penelitian', 'skims'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        // Penanganan checkbox dana_institusi_lain
        $request['digunakan_di_masyarakat'] = $request->has('digunakan_di_masyarakat') ? 1 : 0;

        // Validasi data
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
            'tim_peneliti' => 'nullable|array',
            'mahasiswa' => 'nullable|array',
            'digunakan_di_masyarakat' => 'required|boolean',
            'no_sk' => 'required|string|max:255',
            'sk_penugasan' => 'nullable|file|mimes:pdf,doc,docx',
            'laporan' => 'nullable|file|mimes:pdf,doc,docx',
            'kontrak_penelitian' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // Set tim_peneliti dan mahasiswa sebagai null jika kosong
        if (empty($request->input('tim_peneliti'))) {
            $validasiData['tim_peneliti'] = null;
        }

        if (empty($request->input('mahasiswa'))) {
            $validasiData['mahasiswa'] = null;
        }

        // Penanganan file
        foreach (['sk_penugasan', 'laporan', 'kontrak_penelitian'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($penelitian->$file && Storage::exists($penelitian->$file)) {
                    Storage::delete($penelitian->$file);
                }
                // Simpan file baru
                $validasiData[$file] = $request->file($file)->store($file);
            }
        }

        // Update data penelitian
        $penelitian->update($validasiData);

        return redirect()->route('penelitian.show', $penelitian)->with('success', 'Data penelitian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penelitian $penelitian)
    {
        foreach (['sk_penugasan', 'laporan', 'kontrak_penelitian'] as $file) {
            if ($penelitian->$file && Storage::exists($penelitian->$file)) {
                Storage::delete($penelitian->$file);
            }
        }

        // Hapus data penelitian dari database
        $penelitian->delete();

        return redirect()->route('outbound.index')->with('success', 'Data kunjungan berhasil dihapus');
    }
}
