<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detail::where('dosen_id', auth()->user()->id)->first();

        return view('dosen.detail.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'foto' => 'nullable|string|max:2048',
            'sinta_id' => 'nullable|string|max:20',
            'scopus_id' => 'nullable|string|max:20',
            'orchid_id' => 'nullable|string|max:20',
        ]);
        $validatedData['dosen_id'] = auth()->user()->id;
        Detail::create($validatedData);

        return redirect()->route('detail.index')->with('success', 'Biodata berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        return view('dosen.detail.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        $validatedData = $request->validate([
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|string|max:2048',
            'sinta_id' => 'nullable|string|max:20',
            'scopus_id' => 'nullable|string|max:20',
            'orchid_id' => 'nullable|string|max:20',
        ]);
        $detail->update($validatedData);

        return redirect()->route('detail.index')->with('success', 'Biodata berhasil diperbarui');
    }

}
