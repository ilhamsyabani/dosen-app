@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data pertemuan</h1>
            <p class="mb-4">Berikut adalah daftar pertemuan Anda yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah Dosen -->
        <div class="col-md-6 text-end">
            <a href="{{ route('pertemuan.create') }}" class="btn btn-primary">Tambah pertemuan</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header d-flex items-center justify-between w-full">
            <h6 class="m-0 font-weight-bold text-primary">Daftar pertemuan</h6>
        </div>
        <div class="card-body">
            @if($pertemuans && $pertemuans->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Peran</th>
                            <th>Tingkat</th>
                            <th>Nama Pertemuan</th>
                            <th>Instansi</th>
                            <th>No SK</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Surat Tugas</th>
                            <th>Sertifikat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pertemuans as $pertemuan)
                        <tr>
                            <td>{{ $pertemuan->peran }}</td>
                            <td>{{ $pertemuan->tingkat }}</td>
                            <td>{{ $pertemuan->nama_pertemuan }}</td>
                            <td>{{ $pertemuan->instansi }}</td>
                            <td>{{ $pertemuan->no_sk }}</td>
                            <td>{{ $pertemuan->tgl_mulai}}</td>
                            <td>{{ $pertemuan->tgl_selesai }}</td>
                            <td>
                                @if( $pertemuan->surat_tugas)
                                <a href="{{ asset('storage/'.$pertemuan->surat_tugas) }}" class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                @else
                                Dokumen belum diunggah
                                @endif
                            </td>
                            <td>
                                @if( $pertemuan->sertifikat)
                                <a href="{{ asset('storage/'.$pertemuan->sertifikat) }}" class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                @else
                                Dokumen belum diunggah
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pertemuan.edit', $pertemuan->id) }}" class="btn btn-warning btn-sm">Perbarui</a>
                                <form action="{{ route('pertemuan.destroy', $pertemuan->id) }}" method="POST" style="display:inline-block;">
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
            <p>Belum ada data pertemuanan.</p>
            @endif
        </div>
    </div>

</div>
@endsection
