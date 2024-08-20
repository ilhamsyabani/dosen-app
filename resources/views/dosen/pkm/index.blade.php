@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4 ">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data PKM Insidental</h1>
                <p class="mb-4">Berikut adalah daftar PKM Insidental Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Dosen -->
            <div class="col-md-6 text-end">
                <a href="{{ route('pkm.create') }}" class="btn btn-primary">Tambah PKM</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar PKM Insidental</h6>
            </div>
            <div class="card-body">
                @if ($pkms && $pkms->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Tingkat</th>
                                    <th>Kategori Pembicara</th>
                                    <th>Penyelenggara</th>
                                    <th>Tanggal</th>
                                    <th>Honorarium</th>
                                    <th>No SK</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pkms as $pkm)
                                    <tr>
                                        <td>{{ $pkm->nama }}</td>
                                        <td>{{ $pkm->tingkat }}</td>
                                        <td>{{ $pkm->kategori_pembicara }}</td>
                                        <td>{{ $pkm->penyelenggara }}</td>
                                        <td>{{ $pkm->tanggal }}</td>
                                        <td>{{ $pkm->honorarium }}</td>
                                        <td>{{ $pkm->no_sk }}</td>
                                        <td>
                                            <a href="{{ route('pkm.edit', $pkm->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('pkm.show', $pkm->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('pkm.destroy', $pkm->id) }}" method="POST"
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
                    <p>Belum ada data PKM insidental.</p>
                @endif
            </div>
        </div>

    </div>
@endsection
