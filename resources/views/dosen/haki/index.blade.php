@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Haki</h1>
                <p class="mb-4">Berikut adalah daftar haki Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('haki.create') }}" class="btn btn-primary">Tambah Haki</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Haki</h6>
            </div>
            <div class="card-body">
                @if ($hakis && $hakis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Tingkat</th>
                                    <th>Produk</th>
                                    <th>Judul</th>
                                    <th>Tanggal terbit</th>
                                    <th>url</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hakis as $haki)
                                    <tr>
                                        <td>{{ $haki->jenis }}</td>
                                        <td>{{ $haki->tingkat }}</td>
                                        <td>{{ $haki->produk }}</td>
                                        <td>{{ $haki->judul }}</td>
                                        <td>{{ $haki->tanggal_terbit }}</td>
                                        <td>{{ $haki->url }}</td>
                                        <td>
                                            <a href="{{ route('haki.edit', $haki->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('haki.show', $haki->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('haki.destroy', $haki->id) }}" method="POST"
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
                    <p>Belum ada data haki.</p>
                @endif
            </div>
        </div>
    </div>

@endsection
