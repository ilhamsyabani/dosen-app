@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data pembibingan Mahasiswa</h1>
                <p class="mb-4">Berikut adalah daftar pembimbingan mahasiswa Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('pembimbingan.create') }}" class="btn btn-primary">Tambah Pembimbingan</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pembimbingan</h6>
            </div>
            <div class="card-body">
                @if ($pembimbingans && $pembimbingans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>TA</th>
                                    <th>Jenjang</th>
                                    <th>Banyaknya Bimbingan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembimbingans as $pembimbingan)
                                    <tr>
                                        <td>{{ $pembimbingan->kegiatan }}</td>
                                        <td>{{ $pembimbingan->nama_mahasiswa }}</td>
                                        <td>{{ $pembimbingan->nim }}</td>
                                        <td>{{ $pembimbingan->tahun_ajaran }}</td>
                                        <td>{{ $pembimbingan->jenjang }}</td>
                                        <td>{{ $pembimbingan->banyaknya_bimbingan }}</td>
                                        <td>
                                            <a href="{{ route('pembimbingan.edit', $pembimbingan->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('pembimbingan.show', $pembimbingan->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('pembimbingan.destroy', $pembimbingan->id) }}"
                                                method="POST" style="display:inline-block;">
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
                    <p>Belum ada data Pembinmbingan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
