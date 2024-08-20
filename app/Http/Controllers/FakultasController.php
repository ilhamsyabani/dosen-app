<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
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
        $query = Fakultas::query();

        // Filter berdasarkan pencarian nama atau NIP
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%');
        }

        // Sorting data
        $query->orderBy($sortField, $sortDirection);

        // Menggunakan pagination untuk efisiensi
        $fakultas= $query->paginate(10);

        // Menyertakan parameter sorting dan pencarian di pagination links
        $fakultas->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.departemen.index', compact('fakultas', 'search', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:8',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

        Fakultas::create($request->all());

        return redirect()->route('fakultas.create')->with('success', 'Data fakultas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakulta)
    {
        return view('admin.fakultas.edit', compact('fakulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakulta)
    {
        $request->validate([
            'kode' => 'required|string|max:8',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

        $fakulta->update($request->all());

        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakulta)
    {
        $fakulta->delete();

        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil dihapus.');
    }
}
