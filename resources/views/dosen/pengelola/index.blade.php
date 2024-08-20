@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

     <div class="row justify-content-between items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengelola Jurnal</h1>
                <p class="mb-4">Berikut adalah daftar Pengelola Jurnal Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Dosen -->
            <div class="col-md-6 text-end">
                <a href="{{ route('pengelola.create') }}" class="btn btn-primary">Tambah pengelola</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengelola Jurnal</h6>
            </div>
            <div class="card-body">
                @if ($pengelolas && $pengelolas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Jurnal</th>
                                    <th>Instansi Jurnal </th>
                                    <th>Peran</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Dokumen SK</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengelolas as $pengelola)
                                    <tr>
                                        <td>{{ $pengelola->nama }}</td>
                                        <td>{{ $pengelola->instansi }}</td>
                                        <td>{{ $pengelola->peran }}</td>
                                        <td>{{ $pengelola->tgl_mulai }}</td>
                                        <td>{{ $pengelola->tgl_selesai }}</td>
                                        <td>
                                            @if ($pengelola->sk)
                                                <a href="{{ asset('storage/' . $pengelola->sk) }}"
                                                    class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                            @else
                                                Dokumen belum diunggah
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pengelola.edit', $pengelola->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('pengelola.show', $pengelola->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('pengelola.destroy', $pengelola->id) }}" method="POST"
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
                    <p>Belum ada data pengelolaan Jurnal.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
