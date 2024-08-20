<?php

namespace App\Http\Controllers;

use App\Models\Skim;
use Illuminate\Http\Request;

class SkimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil input untuk pencarian dan sorting
        $search = $request->input('search');
        $sortField = $request->input('sort', 'nama'); // Default sort by nama
        $sortDirection = $request->input('direction', 'asc'); // Default sort direction

        // Query dasar
        $query = Skim::query();

        // Filter berdasarkan pencarian nama atau NIP
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        // Sorting data
        $query->orderBy($sortField, $sortDirection);

        // Menggunakan pagination untuk efisiensi
        $skims = $query->paginate(10);

        // Menyertakan parameter sorting dan pencarian di pagination links
        $skims->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.skim.index', compact('skims', 'search', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skim.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        Skim::create($validasiData);

        return redirect()->route('skim.create')->with('success', 'Data skim berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Skim $skim)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skim $skim)
    {
        return view('admin.skim.edit', compact('skim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skim $skim)
    {
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $skim->update($validasiData);

        return redirect()->route('skim.index')->with('success', 'Data skim berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skim $skim)
    {
        $skim->delete();

        return redirect()->route('skim.index')->with('success', 'Data skim berhasil dihapus.');
    }
}
