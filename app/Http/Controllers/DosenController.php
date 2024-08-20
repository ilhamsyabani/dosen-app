<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource with sorting and search functionalities.
     */
    public function index(Request $request)
    {
        // Mengambil input untuk pencarian dan sorting
        $search = $request->input('search');
        $sortField = $request->input('sort', 'nama'); // Default sort by nama
        $sortDirection = $request->input('direction', 'asc'); // Default sort direction

        // Query dasar
        $query = Dosen::query();

        // Filter berdasarkan pencarian nama atau NIP
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
        }

        // Sorting data
        $query->orderBy($sortField, $sortDirection);

        // Menggunakan pagination untuk efisiensi
        $dosens = $query->paginate(10);

        // Menyertakan parameter sorting dan pencarian di pagination links
        $dosens->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.dosen.index', compact('dosens', 'search', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemens = Departemen::all();
        return view('admin.dosen.create', compact('departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:dosens,nip',
            'email' => 'required|email|unique:dosens,email',
            'departemen_id' => 'required',
        ]);


        Dosen::create($validatedData);

        return redirect()->route('dosen.create')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
       
        return view('admin.dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $departemens = Departemen::all();
        return view('admin.dosen.edit', compact('dosen', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        // Cek jika NIP atau email yang diterima dari request berbeda dengan yang ada di database
        $isNipChanged = $request->input('nip') !== $dosen->nip;
        $isEmailChanged = $request->input('email') !== $dosen->email;

        // Atur aturan validasi berdasarkan perubahan NIP dan email
        $rules = [
            'nama' => 'required|string|max:255',
            'departemen_id' => 'required',
        ];

        if ($isNipChanged) {
            $rules['nip'] = 'required|string|max:20|unique:dosens,nip,' . $dosen->id;
        } else {
            $rules['nip'] = 'required|string|max:20';
        }

        if ($isEmailChanged) {
            $rules['email'] = 'required|email|unique:dosens,email,' . $dosen->id;
        } else {
            $rules['email'] = 'required|email';
        }

        $validatedData = $request->validate($rules);

        $dosen->update($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}
