<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class DepartemenController extends Controller
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
        $query = Departemen::query();

        // Filter berdasarkan pencarian nama atau NIP
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
        }

        // Sorting data
        $query->orderBy($sortField, $sortDirection);

        // Menggunakan pagination untuk efisiensi
        $departemans = $query->paginate(10);

        // Menyertakan parameter sorting dan pencarian di pagination links
        $departemans->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.departemen.index', compact('departemans', 'search', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('admin.departemen.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id'=> 'required',
            'kode' => 'required|string|max:8',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

       Departemen::create($request->all());

        return redirect()->route('departemen.create')->with('success', 'Data departemen berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Departemen $departemen)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departeman)
    {
        $fakultas = Fakultas::all();
        return view('admin.departemen.edit', compact('departeman', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departeman)
    {
        $request->validate([
            'fakultas_id'=> 'required',
            'kode' => 'required|string|max:8',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

       $departeman->update($request->all());

        return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departeman)
    {
        $departeman->delete();

        return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil dihapus.');
    }
}
