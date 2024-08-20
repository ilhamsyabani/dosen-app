@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa pengabdian</h1>
                <p class="mb-4">Berikut adalah daftar pengabdian Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('pengabdian.create') }}" class="btn btn-primary">Tambah Pengabdian</a>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar pengabdian</h6>
            </div>
            <div class="card-body">
                @if ($pengabdians && $pengabdians->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>No SK</th>
                                    <th>Hibah</th>
                                    <th>SKIM</th>
                                    <th>Tahun Usulan</th>
                                    <th>Tahun Kegiatan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Posisi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengabdians as $pengabdian)
                                    <tr>
                                        <td>{{ $pengabdian->judul }}</td>
                                        <td>{{ $pengabdian->no_sk }}</td>
                                        <td>{{ $pengabdian->hibah }}</td>
                                        <td>{{ $pengabdian->skim->nama }}</td>
                                        <td>{{ $pengabdian->tahun_usulan }}</td>
                                        <td>{{ $pengabdian->tahun_kegiatan }}</td>
                                        <td>{{ $pengabdian->tahun_pelaksanaan }}</td>
                                        <td>{{ $pengabdian->posisi }}</td>
                                        <td>
                                            <a href="{{ route('pengabdian.edit', $pengabdian->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('pengabdian.show', $pengabdian->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                                <form action="{{ route('pengabdian.destroy', $pengabdian->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada data pengabdian.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
