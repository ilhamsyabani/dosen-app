@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Penelitan Imiah</h1>
                <p class="mb-4">Berikut adalah daftar penelitian ilmiah Anda yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Mata Kuliah -->
            <div class="col-md-6 text-end">
                <a href="{{ route('penelitian.create') }}" class="btn btn-primary">Tambah Penelitan</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Penelitian</h6>
            </div>
            <div class="card-body">
                @if ($penelitians && $penelitians->count() > 0)
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
                                @foreach ($penelitians as $penelitian)
                                    <tr>
                                        <td>{{ $penelitian->judul }}</td>
                                        <td>{{ $penelitian->no_sk }}</td>
                                        <td>{{ $penelitian->hibah }}</td>
                                        <td>{{ $penelitian->skim->nama }}</td>
                                        <td>{{ $penelitian->tahun_usulan }}</td>
                                        <td>{{ $penelitian->tahun_kegiatan }}</td>
                                        <td>{{ $penelitian->tahun_pelaksanaan }}</td>
                                        <td>{{ $penelitian->posisi }}</td>
                                        <td>
                                            <a href="{{ route('penelitian.edit', $penelitian->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('penelitian.show', $penelitian->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('penelitian.destroy', $penelitian->id) }}" method="POST"
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
                    <p>Belum ada data penelitian.</p>
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
