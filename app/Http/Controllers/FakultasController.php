<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Fakultas::class);

        $search        = $request->input('search');
        $sortField     = $request->input('sort', 'nama');
        $sortDirection = $request->input('direction', 'asc');

        $query = Fakultas::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $query->orderBy($sortField, $sortDirection);
        $fakultas = $query->paginate(10);
        $fakultas->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.fakultas.index', compact('fakultas', 'search', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        $this->authorize('create', Fakultas::class);
        return view('admin.fakultas.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Fakultas::class);

        $request->validate([
            'kode'     => 'required|string|max:8',
            'nama'     => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

        Fakultas::create($request->all());

        return redirect()->route('fakultas.create')->with('success', 'Data fakultas berhasil ditambahkan.');
    }

    public function show(Fakultas $fakultas)
    {
        //
    }

    public function edit(Fakultas $fakulta)
    {
        $this->authorize('update', $fakulta);
        return view('admin.fakultas.edit', compact('fakulta'));
    }

    public function update(Request $request, Fakultas $fakulta)
    {
        $this->authorize('update', $fakulta);

        $request->validate([
            'kode'     => 'required|string|max:8',
            'nama'     => 'required|string|max:255',
            'deskripsi' => 'nullable',
        ]);

        $fakulta->update($request->all());

        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil diperbarui.');
    }

    public function destroy(Fakultas $fakulta)
    {
        $this->authorize('delete', $fakulta);
        $fakulta->delete();
        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil dihapus.');
    }
}
