@extends('layouts.admin')

@section('title', 'Fakultas')

@section('content')
<div class="container-fluid p-4">

    @include('components.alert')

    <div class="row justify-content-between align-items-center mb-4 mt-4">
        <!-- Page Heading -->
        <div class="col-md-6 mt-4">
            <h1 class="h3 mb-3 text-gray-800">Data fakultas</h1>
            <p class="mb-3">Berikut adalah daftar data fakultas yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah fakultas -->
        <div class="col-md-6 text-end">
            <a href="{{ route('fakultas.create') }}" class="btn btn-primary">Tambah fakultas</a>
        </div>
    </div>

    <!-- Pencarian dan Sorting -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('fakultas.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                <select name="sort" class="form-select">
                    <option value="role_asc" {{ request('sort') == 'role_asc' ? 'selected' : '' }}>Urutkan Role (A-Z)</option>
                    <option value="role_desc" {{ request('sort') == 'role_desc' ? 'selected' : '' }}>Urutkan Role (Z-A)</option>
                </select>
                <button type="submit" class="btn btn-outline-secondary ms-2">Cari</button>
            </form>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar fakultas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fakultas as $fakulta)
                        <tr>
                            <td>{{ $fakulta->kode }}</td>
                            <td>{{ $fakulta->nama }}</td>
                            <td>{{ $fakulta->deskripsi ? $fakulta->deskripsi : 'tidak ada deskripsi' }}</td>
                            <td>
                                <a href="{{ route('fakultas.edit', $fakulta->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('fakultas.destroy', $fakulta->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus fakultas ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $fakultas->appends(['search' => request('search'), 'sort' => request('sort')])->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
