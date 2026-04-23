<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Dosen::class);

        $search        = $request->input('search');
        $sortField     = $request->input('sort', 'nama');
        $sortDirection = $request->input('direction', 'asc');

        $query = Dosen::with('departemen.fakultas');

        // Scope berdasarkan role
        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $query->whereHas('departemen', fn($q) => $q->where('fakultas_id', $user->fakultas_id));
        } elseif ($user->isAdminDepartemen()) {
            $query->where('departemen_id', $user->departemen_id);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy($sortField, $sortDirection);
        $dosens = $query->paginate(10);
        $dosens->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.dosen.index', compact('dosens', 'search', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        $this->authorize('create', Dosen::class);

        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $departemens = Departemen::where('fakultas_id', $user->fakultas_id)->get();
        } else {
            $departemens = Departemen::all();
        }

        return view('admin.dosen.create', compact('departemens'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Dosen::class);

        $validatedData = $request->validate([
            'nama'          => 'required|string|max:255',
            'nip'           => 'required|string|max:20|unique:dosens,nip',
            'email'         => 'required|email|unique:dosens,email',
            'departemen_id' => 'required',
            'password'      => 'nullable|string|min:8',
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        }

        Dosen::create($validatedData);

        return redirect()->route('dosen.create')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        $this->authorize('view', $dosen);
        return view('admin.dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        $this->authorize('update', $dosen);

        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $departemens = Departemen::where('fakultas_id', $user->fakultas_id)->get();
        } else {
            $departemens = Departemen::all();
        }

        return view('admin.dosen.edit', compact('dosen', 'departemens'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $this->authorize('update', $dosen);

        $isNipChanged   = $request->input('nip') !== $dosen->nip;
        $isEmailChanged = $request->input('email') !== $dosen->email;

        $rules = [
            'nama'          => 'required|string|max:255',
            'departemen_id' => 'required',
            'password'      => 'nullable|string|min:8',
            'nip'           => $isNipChanged
                ? 'required|string|max:20|unique:dosens,nip,' . $dosen->id
                : 'required|string|max:20',
            'email'         => $isEmailChanged
                ? 'required|email|unique:dosens,email,' . $dosen->id
                : 'required|email',
        ];

        $validatedData = $request->validate($rules);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        }

        $dosen->update($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $this->authorize('delete', $dosen);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}
