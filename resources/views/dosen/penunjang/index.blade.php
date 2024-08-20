@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data penunjang</h1>
            <p class="mb-4">Berikut adalah daftar penunjang Anda yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah Dosen -->
        <div class="col-md-6 text-end">
            <a href="{{ route('penunjang.create') }}" class="btn btn-primary">Tambah penunjang</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header d-flex items-center justify-between w-full">
            <h6 class="m-0 font-weight-bold text-primary">Daftar penunjang</h6>
        </div>
        <div class="card-body">
            @if($penunjangs && $penunjangs->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kepanitiaan/Badan</th>
                            <th>Tingkat </th>
                            <th>Nama Kepanitiaan/Badan</th>
                            <th>Instansi</th>
                            <th>No SK</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penunjangs as $penunjang)
                        <tr>
                            <td>{{ $penunjang->kepanitiaan }}</td>
                            <td>{{ $penunjang->tingkat}}</td>
                            <td>{{ $penunjang->nama }}</td>
                            <td>{{ $penunjang->instansi }}</td>
                            <td>{{ $penunjang->no_sk }}</td>
                            <td>{{ $penunjang->tgl_mulai}}</td>
                            <td>{{ $penunjang->tgl_selesai }}</td>
                            <td>
                                <a href="{{ route('penunjang.edit', $penunjang->id) }}" class="btn btn-warning btn-sm">Perbarui</a>
                                <a href="{{ route('penunjang.show', $penunjang->id) }}" class="btn btn-success btn-sm">Detail</a>
                                <form action="{{ route('penunjang.destroy', $penunjang->id) }}" method="POST" style="display:inline-block;">
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
            <p>Belum ada data penunjangan lain.</p>
            @endif
        </div>
    </div>

</div>
@endsection
