<?php

namespace App\Http\Controllers;

use App\Models\Studi;
use Illuminate\Http\Request;

class StudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studis = auth()->user()->studis;

        return view('dosen.studi.index', compact('studis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenjang_pendidikan' => 'required|string|max:100',
            'bidang_studi' => 'required|string|max:100',
            'institusi_pendidikan' => 'required|string|max:100',
            'tahun_masuk' => 'required|string|max:4',
            'tahun_lulus' => 'required|string|max:4',
            'nilai_akhir' => 'required|string|max:4',

        ]);
        $validatedData['dosen_id'] = auth()->user()->id;
        Studi::create($validatedData);

        return redirect()->route('studi.index')->with('success', 'Data pendidikan berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studi $studi)
    {
        $valiadsiData = $request->validate([
            'jenjang_pendidikan' => 'required|string|max:100',
            'bidang_studi' => 'required|string|max:100',
            'institusi_pendidikan' => 'required|string|max:100',
            'tahun_masuk' => 'required|string|max:4',
            'tahun_lulus' => 'required|string|max:4',
            'nilai_akhir' => 'required|string|max:4',
        ]);

        $studi->update($valiadsiData);

        return redirect()->route('studi.index')->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studi $studi)
    {
        $studi->delete();
        return redirect()->route('studi.index')->with('success', 'Data pendidikan berhasil dihapus.');
    }
}
