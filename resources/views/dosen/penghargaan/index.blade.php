@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Penghargaan</h1>
                <p class="mb-4">Berikut adalah daftar penghargaan Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Dosen -->
            <div class="col-md-6 text-end">
                <a href="{{ route('penghargaan.create') }}" class="btn btn-primary">Tambah penghargaan</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Penghargaan</h6>
            </div>
            <div class="card-body">
                @if ($penghargaans && $penghargaans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tingkat</th>
                                    <th>Nama Penghargaan</th>
                                    <th>Tahun</th>
                                    <th>Instansi Pemberi</th>
                                    <th>Sertifikat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penghargaans as $penghargaan)
                                    <tr>
                                        <td>{{ $penghargaan->tingkat }}</td>
                                        <td>{{ $penghargaan->nama }}</td>
                                        <td>{{ $penghargaan->tahun }}</td>
                                        <td>{{ $penghargaan->instansi }}</td>
                                        <td>
                                            @if ($penghargaan->sertifikat)
                                                <a href="{{ asset('storage/' . $penghargaan->sertifikat) }}"
                                                    class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                            @else
                                                Dokumen belum diunggah
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('penghargaan.edit', $penghargaan->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <form action="{{ route('penghargaan.destroy', $penghargaan->id) }}"
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
                    <p>Belum ada data penghargaanan.</p>
                @endif
            </div>
        </div>

    </div>
@endsection
