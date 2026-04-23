<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $search        = $request->input('search');
        $sortField     = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $query = User::query();

        // Scope berdasarkan role
        $user = auth()->user();
        if ($user->isAdminFakultas()) {
            $query->where('fakultas_id', $user->fakultas_id);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy($sortField, $sortDirection);
        $users = $query->paginate(10);
        $users->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.user.index', compact('users', 'search', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $user = auth()->user();
        if ($user->isSuperAdmin()) {
            $departemens = Departemen::all();
            $fakultases  = Fakultas::all();
        } else {
            $departemens = Departemen::where('fakultas_id', $user->fakultas_id)->get();
            $fakultases  = Fakultas::where('id', $user->fakultas_id)->get();
        }

        return view('admin.user.create', compact('departemens', 'fakultases'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $validasiData = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|string|min:8',
            'departemen_id' => 'nullable',
            'fakultas_id'   => 'nullable',
            'role'          => 'required|string',
            'nip'           => 'nullable|string|max:20|unique:users,nip',
        ]);

        // Admin Fakultas hanya bisa membuat Admin Departemen
        if (auth()->user()->isAdminFakultas()) {
            $validasiData['role']        = User::ROLE_ADMIN_DEPARTEMEN;
            $validasiData['fakultas_id'] = auth()->user()->fakultas_id;
        }

        $validasiData['password'] = bcrypt($validasiData['password']);

        if (!empty($validasiData['departemen_id'])) {
            $validasiData['fakultas_id'] = Departemen::find($validasiData['departemen_id'])->fakultas->id;
        }

        User::create($validasiData);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $authUser = auth()->user();
        if ($authUser->isSuperAdmin()) {
            $departemens = Departemen::all();
            $fakultases  = Fakultas::all();
        } else {
            $departemens = Departemen::where('fakultas_id', $authUser->fakultas_id)->get();
            $fakultases  = Fakultas::where('id', $authUser->fakultas_id)->get();
        }

        return view('admin.user.edit', compact('user', 'departemens', 'fakultases'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validasiData = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password'      => 'nullable|string|min:8',
            'departemen_id' => 'nullable',
            'fakultas_id'   => 'nullable',
            'role'          => 'required|string',
            'nip'           => ['nullable', 'string', 'max:20', Rule::unique('users', 'nip')->ignore($user->id)],
        ]);

        // Admin Fakultas tidak bisa mengubah role
        if (auth()->user()->isAdminFakultas()) {
            $validasiData['role'] = User::ROLE_ADMIN_DEPARTEMEN;
        }

        if (!empty($validasiData['password'])) {
            $validasiData['password'] = bcrypt($validasiData['password']);
        } else {
            unset($validasiData['password']);
        }

        $user->update($validasiData);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }
}
