<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil input untuk pencarian dan sorting
        $search = $request->input('search');
        $sortField = $request->input('sort', 'name'); // Default sort by name
        $sortDirection = $request->input('direction', 'asc'); // Default sort direction

        // Query dasar
        $query = User::query();

        // Menyesuaikan query jika pengguna adalah 'Admin Fakultas'
        if (auth()->user()->role == 'Admin Fakultas') {
            $query->where('fakultas_id', auth()->user()->fakultas_id);
        }

        // Filter berdasarkan pencarian name atau NIP
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }

        // Sorting data
        $query->orderBy($sortField, $sortDirection);

        // Menggunakan pagination untuk efisiensi
        $users = $query->paginate(10);

        // Menyertakan parameter sorting dan pencarian di pagination links
        $users->appends(['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]);

        return view('admin.user.index', compact('users', 'search', 'sortField', 'sortDirection'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            // Filter departemen dan fakultas berdasarkan fakultas_id dari user yang login
            $departemens = Departemen::all();
            $fakultases = Fakultas::all();
        } else {
            // Jika bukan Admin Fakultas, ambil semua departemen dan fakultas
            $departemens = Departemen::where('fakultas_id', auth()->user()->fakultas_id)->get();
            $fakultases = Fakultas::where('id', auth()->user()->fakultas_id)->get();
        }

        return view('admin.user.create', compact('departemens', 'fakultases'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasiData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email', // Validasi email yang unik
            'password' => 'required|string|min:8', // Minimal 8 karakter dan harus dikonfirmasi
            'departemen_id' => 'nullable', // Validasi untuk prodi
            'fakultas_id' => 'nullable', // Validasi untuk prodi
            'role' => 'required|string', // Validasi role dengan pilihan terbatas
            'nip' => 'nullable|string|max:20|unique:users,nip', // NIP harus unik
        ]);

        // Enkripsi password sebelum disimpan
        $validasiData['password'] = bcrypt($validasiData['password']);

        if ($validasiData['departemen_id']) {
            $id = $validasiData['departemen_id'];
            $validasiData['fakultas_id'] = Departemen::find($id)->fakultas->id;
        }
        // Simpan data ke database
        User::create($validasiData);

        // Redirect dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (auth()->user()->role == 'admin') {
            // Filter departemen dan fakultas berdasarkan fakultas_id dari user yang login
            $departemens = Departemen::all();
            $fakultases = Fakultas::all();
        } else {
            // Jika bukan Admin Fakultas, ambil semua departemen dan fakultas
            $departemens = Departemen::where('fakultas_id', auth()->user()->fakultas_id)->get();
            $fakultases = Fakultas::where('id', auth()->user()->fakultas_id)->get();
        }

        return view('admin.user.edit', compact('user', 'departemens', 'fakultases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi data input dengan kondisi dinamis
        $validasiData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ], // Validasi email yang unik, kecuali untuk user yang sedang diupdate
            'password' => 'nullable|string|min:8', // Password opsional, minimal 8 karakter
            'departemen_id' => 'nullable',
            'fakultas_id' => 'nullable',
            'role' => 'required|string',
            'nip' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('users', 'nip')->ignore($user->id),
            ], // Validasi NIP yang unik, kecuali untuk user yang sedang diupdate
        ]);

        // Jika password diisi, enkripsi sebelum disimpan
        if (!empty($validasiData['password'])) {
            $validasiData['password'] = bcrypt($validasiData['password']);
        } else {
            // Jika password tidak diisi, hapus dari array agar tidak diupdate
            unset($validasiData['password']);
        }

        // Simpan data ke database
        $user->update($validasiData);

        // Redirect dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }
}
