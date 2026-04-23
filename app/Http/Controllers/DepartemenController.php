<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Departemen::class);

        $search        = $request->input('search');
        $sortField     = $request->input('sort', 'nama');
        $sortDirection = $request->input('direction', 'asc');

        $query = Departemen::query();

        // Scope berdasarkan role
        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $query->where('fakultas_id', $user->fakultas_id);
        } elseif ($user->isAdminDepartemen()) {
            $query->where('id', $user->departemen_id);
        }

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $query->orderBy($sortField, $sortDirection);
        $departemans = $query->paginate(10);
        $departemans->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.departemen.index', compact('departemans', 'search', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        $this->authorize('create', Departemen::class);

        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $fakultas = Fakultas::where('id', $user->fakultas_id)->get();
        } else {
            $fakultas = Fakultas::all();
        }

        return view('admin.departemen.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Departemen::class);

        $request->validate([
            'fakultas_id' => 'required',
            'kode'        => 'required|string|max:8',
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'nullable',
        ]);

        Departemen::create($request->all());

        return redirect()->route('departemen.create')->with('success', 'Data departemen berhasil dibuat.');
    }

    public function edit(Departemen $departeman)
    {
        $this->authorize('update', $departeman);

        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $fakultas = Fakultas::where('id', $user->fakultas_id)->get();
        } else {
            $fakultas = Fakultas::all();
        }

        return view('admin.departemen.edit', compact('departeman', 'fakultas'));
    }

    public function update(Request $request, Departemen $departeman)
    {
        $this->authorize('update', $departeman);

        $request->validate([
            'fakultas_id' => 'required',
            'kode'        => 'required|string|max:8',
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'nullable',
        ]);

        $departeman->update($request->all());

        return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil diperbarui.');
    }

    public function destroy(Departemen $departeman)
    {
        $this->authorize('delete', $departeman);
        $departeman->delete();
        return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil dihapus.');
    }
}
