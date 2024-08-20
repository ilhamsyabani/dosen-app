@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Kunjungan Imiah</h1>
                <p class="mb-4">Berikut adalah daftar kunjungan ilmiah Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('kunjungan.create') }}" class="btn btn-primary">Tambah Kunjungan</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kunjungan</h6>
            </div>
            <div class="card-body">
                @if ($kunjungans && $kunjungans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenjang</th>
                                    <th>Univeritas</th>
                                    <th>Prodi</th>
                                    <th>Matakuliah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungans as $kunjungan)
                                    <tr>
                                        <td>{{ $kunjungan->tanggal }}</td>
                                        <td>{{ $kunjungan->jenjang }}</td>
                                        <td>{{ $kunjungan->universitas }}</td>
                                        <td>{{ $kunjungan->prodi }}</td>
                                        <td>{{ $kunjungan->matkul }}</td>

                                        <td>
                                            <a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('kunjungan.show', $kunjungan->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                                <form action="{{ route('kunjungan.destroy', $penelitian->id) }}" method="POST"
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
                    <p>Belum ada data kunjungan Imiah.</p>
                @endif
            </div>
        </div>
    </div>


    @include('components.modal-delete')

    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var url = button.data('url')
            var modal = $(this)
            modal.find('#deleteForm').attr('action', url)
        })
    </script>

@endsection
