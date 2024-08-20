<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahans = auth()->user()->bahans;
        return view('dosen.bahan.index', compact('bahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $verifiedData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'produk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('produk')) {
            $file = $request->file('produk');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $verifiedData['produk'] = $fileName;
        }

        $verifiedData['dosen_id'] = auth()->user()->id;
        Bahan::create($verifiedData);

        return redirect()->route('bahan.create')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bahan $bahan)
    {
        return view('dosen.bahan.show', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahan $bahan)
    {
        return view('dosen.bahan.edit', compact('bahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bahan $bahan)
    {
        $verifiedData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'bulan/tahun' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'produk' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        if ($request->hasFile('produk')) {
            $file = $request->file('produk');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $verifiedData['produk'] = $fileName;
        }
        $bahan->update($verifiedData);

        return redirect()->route('bahan.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahan $bahan)
    {
        if ($bahan->produk) {
            $filePath = public_path('uploads') . '/' . $bahan->produk;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $bahan->delete();

        return redirect()->route('bahan.index')->with('success', 'Data berhasil dihapus.');
    }
}
