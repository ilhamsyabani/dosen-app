@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data Organisasi Profesi</h1>
            <p class="mb-4">Berikut adalah daftar Organisasi Profesi Anda yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah Dosen -->
        <div class="col-md-6 text-end">
            <a href="{{ route('profesi.create') }}" class="btn btn-primary">Tambah organisasi</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header d-flex items-center justify-between w-full">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Organisasi Profesi</h6>
        </div>
        <div class="card-body">
            @if($profesis && $profesis->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Jabatan </th>
                            <th>Nama Organisasi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Kartu Anggota</th>
                            <th>SK Pengurus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profesis as $profesi)
                        <tr>
                            <td>{{ $profesi->tingkat }}</td>
                            <td>{{ $profesi->jabatan}}</td>
                            <td>{{ $profesi->nama_org }}</td>
                            <td>{{ $profesi->tgl_mulai}}</td>
                            <td>{{ $profesi->tgl_selesai }}</td>
                            <td>
                                @if( $profesi->kta)
                                <a href="{{ asset('storage/'.$profesi->kta) }}" class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                @else
                                Dokumen belum diunggah
                                @endif
                            </td>
                            <td>
                                @if( $profesi->sk)
                                <a href="{{ asset('storage/'.$profesi->sk) }}" class="btn btn-link btn-sm p-0">Lihat Dokumen</a>
                                @else
                                Dokumen belum diunggah
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('profesi.edit', $profesi->id) }}" class="btn btn-warning btn-sm">Perbarui</a>
                                <form action="{{ route('profesi.destroy', $profesi->id) }}" method="POST" style="display:inline-block;">
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
            <p>Belum ada data Organisasi.</p>
            @endif
        </div>
    </div>

</div>
@endsection
