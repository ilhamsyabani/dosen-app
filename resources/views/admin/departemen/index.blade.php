@extends('layouts.admin')

@section('title', 'Departemen')

@section('content')
<div class="container-fluid p-4">

    @include('components.alert')

    <div class="row justify-content-between align-items-center mb-4 mt-4">
        <!-- Page Heading -->
        <div class="col-md-6 mt-4">
            <h1 class="h3 mb-3 text-gray-800">Data departemen</h1>
            <p class="mb-3">Berikut adalah daftar data departemen yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah departemen -->
        <div class="col-md-6 text-end">
            <a href="{{ route('departemen.create') }}" class="btn btn-primary">Tambah departemen</a>
        </div>
    </div>

    <!-- Pencarian dan Sorting -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('departemen.index') }}" method="GET" class="d-flex">
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar departemen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departemans as $departeman)
                        <tr>
                            <td>{{ $departeman->kode }}</td>
                            <td>{{ $departeman->nama }}</td>
                            <td>{{ $departeman->fakultas->nama }}</td>
                            <td>{{ $departeman->deskripsi ? $departeman->deskripsi : 'belum di deskripsikan' }}</td>
                            <td>
                                <a href="{{ route('departemen.edit', $departeman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('departemen.destroy', $departeman->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $departemans->appends(['search' => request('search'), 'sort' => request('sort')])->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
