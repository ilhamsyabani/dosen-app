@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Binaan</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa binaan Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('pembinaan.create') }}" class="btn btn-primary">Tambah Pembinaan</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembinaan</h6>
            </div>
            <div class="card-body">
                @if ($pembinaans && $pembinaans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Jenjang</th>
                                    <th>Prodi</th>
                                    <th>Nama Program</th>
                                    <th>Jenis Program</th>
                                    <th>Tingkat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembinaans as $pembinaan)
                                    <tr>
                                        <td>{{ $pembinaan->nama_mahasiswa }}</td>
                                        <td>{{ $pembinaan->tahun_ajaran }}</td>
                                        <td>{{ $pembinaan->jenjang }}</td>
                                        <td>{{ $pembinaan->prodi }}</td>
                                        <td>{{ $pembinaan->nama_program }}</td>
                                        <td>{{ $pembinaan->jenis_program }}</td>
                                        <td>{{ $pembinaan->tingkat }}</td>
                                        <td>
                                            <a href="{{ route('pembinaan.edit', $pembinaan->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('pembinaan.show', $pembinaan->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('pembinaan.destroy', $pembinaan->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada data pembinaan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
