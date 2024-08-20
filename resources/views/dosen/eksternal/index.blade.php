@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengajaran Luar Kampus</h1>
                <p class="mb-4">Berikut adalah daftar pengajaran luar kampus Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('eksternal.create') }}" class="btn btn-primary">Tambah Kampus</a>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajaran Luar Kampus</h6>
            </div>
            <div class="card-body">
                @if ($eksternals && $eksternals->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenjang</th>
                                    <th>Univeritas</th>
                                    <th>Fakultas</th>
                                    <th>Prodi</th>
                                    <th>Matakuliah</th>
                                    <th>SKS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eksternals as $eksternal)
                                    <tr>
                                        <td>{{ $eksternal->tanggal }}</td>
                                        <td>{{ $eksternal->jenjang }}</td>
                                        <td>{{ $eksternal->universitas }}</td>
                                        <td>{{ $eksternal->fakultas }}</td>
                                        <td>{{ $eksternal->prodi }}</td>
                                        <td>{{ $eksternal->matakuliah }}</td>
                                        <td>{{ $eksternal->sks }}</td>
                                        <td>
                                            <a href="{{ route('eksternal.edit', $eksternal->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('eksternal.show', $eksternal->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('eksternal.destroy', $eksternal->id) }}" method="POST"
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
                    <p>Belum ada data kampus.</p>
                @endif
            </div>
        </div>
    </div>

@endsection
